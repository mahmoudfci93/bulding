@extends('admin.layouts.layout')
@section('title')
    تعديل بيانات الاعضاء
@endsection

@section('headder')

@endsection

@section('content')
    <section class="content-header">
        <h1>
تعديل الاعضاء
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin-panel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/admin-panel/users')}}">التحكم في الأعضاء</a></li>
            <li class="active"><a href="{{route('users.edit',$user->id)}}">
                    تعديل العضو
                   {{$user->name}}
                </a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            تعديل العضو:
                            {{$user->name}}
                        </h3>
                        {!!Form::model($user,['route'=>['users.update',$user->id],'method'=>'PATCH'])!!}
                         @include('admin.user.form2')
                        {!! Form::close() !!}

                            {!!Form::open(['route'=>['users.destroy',$user->id],'method'=>'DELETE'])!!}

                            <button type="submit" class="btn btn-danger" style="padding-left: 24px; margin-left: 74px ; margin-top: -28px; float:left ">
                                <span class="glyphicon glyphicon-user fa fa-trash-o" style="color: #FFFFFF"></span>
                                حذف العضو
                            </button>

                            {!! Form::close() !!}

                    </div>


                </div>

                </div>
            </div>




    </section>
@endsection

@section('footer')

@endsection