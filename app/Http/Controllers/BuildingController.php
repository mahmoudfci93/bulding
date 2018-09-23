<?php

namespace App\Http\Controllers;

use App\Building;
use App\Http\Requests\BuldingRequest;
use App\Http\Requests\UserAddBuRequest;
use App\Photo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;

class BuildingController extends Controller
{
    public function index()
    {
        $image = Photo::all();

        return view('admin.building.index',compact('image'));
    }

    public function create()
    {
        return view('admin.building.add');
    }

    public function edit($id)
    {
        $bu = Building::findOrFail($id);

        return view('admin.building.edit',compact('bu'));
    }
    public function store(BuldingRequest $request, Building $bu)
    {
        $user = Auth::user();
        $data=[
            'name'        =>$request->name,
            'user_id'     =>$user->id,
            'price'       =>$request->price,
            'rent'        =>$request->rent,
            'square'      =>$request->square,
            'type'        =>$request->type,
            'small_desc'  =>$request->small_desc,
            'meta'        =>$request->meta,
            'langitude'   =>$request->langitude,
            'latitude'    =>$request->latitude,
            'large_desc'  =>$request->large_desc,
            'status'      =>$request->status,
            'rooms'       =>$request->rooms,
            'place'       =>$request->place
        ];
        $bu->create($data);

        /////// upload Images ///////////
        $buildingId = Building ::orderBy('id', 'desc')->first()->id;
        $file = Input::file('photos');

            $destinationPath = 'uploads';
            $filename = $file->getClientOriginalName();
            $unique_name = md5($filename. time());
            $upload_success = $file->move($destinationPath, $unique_name);
            // save into database
            $photo = new Photo();
            $product = new Building();
            $photo->name = $unique_name;
            $photo->building_id=$buildingId;
            $photo->save();


        return redirect('/admin-panel/buildings')->withFlashMessage('تم إضافة العقار بنجاح');


    }
    public function update(BuldingRequest $req,$id)
    {

        $bu = Building::findOrFail($id);
        $bu->fill($req->all())->save();

        /////// upload Images ///////////
            if ($bu->photo->building_id == $bu->id){
                $bu->photo()->delete();
                unlink(public_path()."/uploads/".$bu->photo->name);
            }
            $file = Input::file('photos');
            $destinationPath = 'uploads';
            $filename = $file->getClientOriginalName();
            $unique_name = md5($filename . time());
            $upload_success = $file->move($destinationPath, $unique_name);

            // save into database
            $photo = new Photo();
            $product = new Building();
            $photo->name = $unique_name;
            $photo->building_id = $bu->id;
            $photo->save();
        return Redirect::back()->withFlashMessage('تم التعديل على العقار بنجاح');
    }
    public function destroy($id)
    {
        $bu = Building::findOrFail($id);
        foreach ($bu->photo as $image)
        {
            unlink(public_path()."/uploads/".$image->name);
           // $bu->photo->delete();
        }


        $bu->delete();



        return Redirect::back()->withFlashMessage('تم حذف العقار بنجاح');
    }
    public function anyData(Building $bu)
    {

        $bus = $bu->all();

        return Datatables::of($bus)

            ->editColumn('name', function ($model) {

                return '<a href="' . route('buildings.edit', $model->id) .'">' .$model->name. '</a>';

            })
            ->editColumn('type', function ($model) {
                $type = bu_type();
                return  '<span class="badge badge-info">'.$type[$model->type].'</span>';
            })

            ->editColumn('status', function ($model) {
                return $model->status == 0 ? '<span class="badge badge-info">' . 'غير مفعل' . '</span>' : '<span class="badge badge-warning">' . 'مفعل' . '</span>';
            })

            ->editColumn('control', function ($model) {
                $all = '<a href="' . url('/admin-panel/buildings/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a> ';
                $all .= '<a href="' .url('/admin-panel/buildings/'. $model->id.'/delete'). '" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';

                return $all;
            })
            ->rawColumns(['name','type','control','status'])
            ->make(true);
    }
    public function showAllEnabled()
    {
        $showAll = Building::where('status',1)->orderBy('id','desc')->paginate(15);

        return view('website.bu.all',compact('showAll'));
    }
    public function ForRent()
    {
        $showAll = Building::where('status',1)->where('rent',1)->orderBy('id','desc')->paginate(15);

        return view('website.bu.all',compact('showAll'));
    }
    public function ForBuy()
    {
        $showAll = Building::where('status',1)->where('rent',0)->orderBy('id','desc')->paginate(15);

        return view('website.bu.all',compact('showAll'));
    }
    public function type($type)
    {
        if(in_array($type,[0,1,2]))
        {
            $showAll = Building::where('status',1)->where('type',$type)->orderBy('id','desc')->paginate(15);
            return view('website.bu.all',compact('showAll'));
        }else{
            return Redirect::back();
        }
    }
    public function search(Request $request)
    {
      //  $requestAll = array_except($request->toArray(),['submit','_token','page']);
        $query = Building::with('photo');
        if ($request->place !=''){
            $query->where('place',$request->place);
        }
        if ($request->rooms !=''){
            $query->where('rooms',$request->rooms);
        }
        if ($request->type !=''){
            $query->where('type',$request->type);
        }
        if ($request->rent !=''){
            $query->where('rent',$request->rent);
        }
        if ($request->square !=''){
            $query->where('square',$request->square);
        }
      ////// price/////
        if ($request->price)
        {
            $query->where('price',$request->price);
        }
        if ($request->price_from !='' && $request->price_to =='' ){
            $query->where('price','>=',$request->price_from);
        }
        if ($request->price_from =='' && $request->price_to !='' ){
            $query->where('price','<=',$request->price_to);
        }
        if ($request->price_from !='' && $request->price_to !='' ){
            $query->whereBetween($request->price_from,$request->price_to);
        }
       
        $showAll = $query->paginate(6);

       /* $query = DB::table('buildings')->select('*');
        $array = [];
        $count = count($requestAll);
        $i = 0;
        foreach ($requestAll as $key => $req){
            $i++;
            if($req != '') {
                if ($key == 'price_from' && $request->price_to == '') {
                    $query->where('price', '>=', $req);
                } elseif ($key == 'price_to' && $request->price_from == '') {
                    $query->where('price', '<=', $req);
                } else {
                    if ($key != 'price_to' && $key != 'price_from') {
                        $query->where($key, $req);
                    }
                }
                $array[$key] = $req;
            }elseif ($count == $i && $request->price_to !='' && $request->price_from !=''){
                $query->whereBetween('price',[$request->price_from , $request->price_to]);
                $array[$key] = $req;
            }
    }
        $showAll = $query->paginate(6);
        */
        return view('website.bu.all',compact('showAll'));

    }
    public function showSingleBuilding($id)
    {
        $bu = Building::findOrFail($id);
        if ($bu->status ==0){
            return view('website.bu.notEnabled',compact('bu'));
        }else{
            $sameRent = Building::where('rent',$bu->rent)->orderBy(DB::raw('RAND()'))->take(3)->get();
            $sameType = Building::where('type',$bu->type)->orderBy(DB::raw('RAND()'))->take(3)->get();
            return view('website.bu.single',compact('bu','sameRent','sameType'));
        }

    }
    public function getAjaxInfo(Request $request , Building $bu)
    {

        $building = Building::with('photo')->findOrFail($request->id);
       //return json_encode($buImage,$building);
       // return $bu->find($request->id)->toJson();
       //return Response::json(array('data' => $building));
        return $building->toJson();
    }

    ////  user Functions ////////
    public function userAddBuilding()
    {
        return view('website.userBuilding.userAddBuilding');
    }
    public function userStoreBuilding(UserAddBuRequest $request , Building $bu)
    {
        $user = Auth::user()? Auth::user()->id : 0;
        $data=[
            'name'        =>$request->name,
            'user_id'     =>$user,
            'price'       =>$request->price,
            'rent'        =>$request->rent,
            'square'      =>$request->square,
            'type'        =>$request->type,
            'small_desc'  =>strip_tags(str_limit($request->large_desc,75)),
            'meta'        =>$request->meta,
            'langitude'   =>$request->langitude,
            'latitude'    =>$request->latitude,
            'large_desc'  =>$request->large_desc,
            'rooms'       =>$request->rooms,
            'place'       =>$request->place
        ];
        $bu->create($data);


        /////// upload Images ///////////
        $buildingId = Building ::orderBy('id', 'desc')->first()->id;
        $file = Input::file('photos');

        $destinationPath = 'uploads';
        $filename = $file->getClientOriginalName();
        $unique_name = md5($filename. time());
        $upload_success = $file->move($destinationPath, $unique_name);
        // save into database
        $photo = new Photo();
        $product = new Building();
        $photo->name = $unique_name;
        $photo->building_id=$buildingId;
        $photo->save();

        return view('website.userBuilding.buildingAdded')->withFlashMessage('تم إضافة العقار بنجاح');

    }
    public function userShowBuilding()
    {
        $user = Auth::user();
        $bu = Building::where('user_id',$user->id)->paginate(10);
        return view('website.userBuilding.showUserBuilding',compact(['bu','user']));
    }
}
