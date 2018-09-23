<?php

namespace App\Http\Controllers;

use App\Building;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\AdminUsersEditRequest;
use App\Http\Requests\UserProfileRequst;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return User
     */
    public function store(AddUserRequest $request,User $user)
    {

        $user->create([
            'name'     =>$request->name,
             'email'   =>$request->email,
             'password'=>bcrypt($request->password),

        ]);
       return redirect('admin-panel/users')->withFlashMessage('تم إضافة العضو بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit',compact('user'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if(trim($request->password) =='' )
        {
            $input = $request->except('password');

        }else
        {
            $input = $request->all();
        }

        $input['password'] = bcrypt($request->password);

        $user->update($input);

        return redirect('admin-panel/users')->withFlashMessage('تم التعديل على العضو بنجاح');

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::findOrFail($id);
        Building::where('user_id',$id)->delete();
        $user->delete();
        return redirect('admin-panel/users')->withFlashMessage('تم حذف العضو بنجاح');
    }

    public function anyData(User $user)
    {

        $users = $user->all();

        return Datatables::of($users)

            ->editColumn('name', function ($model) {

                return '<a href="' . route('users.edit', $model->id) .'">' .$model->name. '</a>';

            })
            ->editColumn('is_admin', function ($model) {
                return $model->is_admin == 0 ? '<span class="badge badge-info">' . 'عضو' . '</span>' : '<span class="badge badge-warning">' . 'مدير الموقع' . '</span>';
            })

            ->addColumn('control', function ($model) {
                 $all = '<a href="' . url('/admin-panel/users/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a> ';
                if($model->id != 1){

                // $all .= '<a href="' .route('users.destroy', $model->id). '" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
                }
                return $all;
            })
            ->rawColumns(['name','is_admin','control','is_admin'])
            ->make(true);


    }

public function editUserProfile()
{
    $user = Auth::user();
    return view('website.userProfile.edit',compact('user'));
}
    public function updateUserProfile(UserProfileRequst $request)
    {
        $user = Auth::user();

        if(trim($request->password) =='' )
        {
            $input = $request->except('password');

        }else
        {
            $input = $request->all();
        }

        $input['password'] = bcrypt($request->password);

        $user->update($input);
        return Redirect::back()->withFlashMessage('تم التعديل على العضو بنجاح');

    }


}
