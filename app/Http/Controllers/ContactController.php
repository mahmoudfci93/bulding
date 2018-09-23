<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{
    public function index()
    {
        $messages = Contact::all();
        return view('admin.contact.index');
    }
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->fill(['view'=>1])->save();
        return view('admin.contact.edit',compact('contact'));
    }
    public function store(ContactRequest $request , Contact $contact)
    {
        $contact->create($request->all());
        return Redirect::back()->withFlashMessage('تم ارسال الرسالة بنجاح');
    }
    public function update(ContactRequest $request , $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->fill($request->all())->save();
        return Redirect::back()->withFlashMessage('تم التعديل على الرسالة بنجاح');
    }
    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return Redirect::back()->withFlashMessage('تم حذف الرسالة بنجاح');
    }
    public function anyData(Contact $contact)
    {

        $contacts = $contact->all();

        return Datatables::of($contacts)

            ->editColumn('name', function ($model) {

                return '<a href="' . route('contact.edit', $model->id) .'">' .$model->name. '</a>';

            })
            ->editColumn('type', function ($model) {
                return  '<span class="badge badge-info">'.\contact()[$model->type].'</span>';
            })

            ->editColumn('view', function ($model) {
                return $model->view == 0 ? '<span class="badge badge-info">' . 'رسالة جديدة' . '</span>' : '<span class="badge badge-warning">' . 'رسالة قديمة' . '</span>';
            })

            ->editColumn('control', function ($model) {
                $all = '<a href="' . url('/admin-panel/contact/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a> ';
                $all .= '<a href="' .url('/admin-panel/contact/'. $model->id.'/delete'). '" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';

                return $all;
            })
            ->rawColumns(['name','type','control','view'])
            ->make(true);
    }
}
