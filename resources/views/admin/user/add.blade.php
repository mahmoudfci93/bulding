@extends('admin.layouts.layout')
@section('title')
    اضافة عضو جديد
@endsection

@section('headder')

@endsection

@section('content')
    <section class="content-header">
        <h1>
            اضافة عضو
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin-panel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/admin-panel/users')}}">التحكم في الأعضاء</a></li>
            <li class="active"><a href="{{url('/admin-panel/users/create')}}">اضافة عضو </a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">اضافة عضو جديد</h3>
                        <form class="form-horizontal" method="POST" action="{{ route('users.store') }}">
                        @include('admin.user.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')

@endsection