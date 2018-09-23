@extends('layouts.app')

@section('title')
   اضافة عقار جديد
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
                        <li class="breadcrumb-item"><a href="{{url('/user/create/building')}}">اضافة عقار جديد</a></li>
                    </ol>
                </nav>
                <div class="profile-content">
                    {!! Form::open(['url'=>'/user/create/building','method'=>'post','files'=>true]) !!}
                    @include('admin.building.form',['user'=>1])
                    <div class="form-group" style="padding-bottom: 10px">
                        <div class="col-md-8"  style="float: right">
                            <button type="submit" class="btn btn-warning">
                                <span class="glyphicon glyphicon-user" style="color: #FFFFFF"></span>
                                إضافـة عقار جديـد
                            </button>
                        </div>
                    </div>

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

