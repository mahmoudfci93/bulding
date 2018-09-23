@extends('layouts.app')

@section('title')
تعديل المعلومات الشخصية للعضو
    {{$user->name}}
@endsection

@section('header')
    {!! Html::style('custom/buall.css') !!}
    <style>
        .itemsearch{
            margin-bottom: 10px;
        }
        .breadcrumb{
            background-color: #ffffff;
        }
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="row profile">
            <div class="col-md-9">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                        <li class="active"><a href="#">
                                تعديل المعلومات الشخصية للعضو
                                {{$user->name}}
                            </a></li>
                    </ol>
                </nav>
                <div class="profile-content">
                    {!!Form::model($user,['route'=>['update.userProfile',$user->id],'method'=>'PATCH'])!!}
                    @include('admin.user.form2',['userProfile'=>1])
                    {!! Form::close() !!}
                </div>
            </div>
            @include('website.bu.pages')
        </div>
    </div>
    <br>
    <br>




@endsection




<!--
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

