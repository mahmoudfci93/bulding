@extends('layouts.app')

@section('title')
تم اضافة العقار بنجاح
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
                        <li class="active"><a href="#">تمت الاضافة</a></li>
                    </ol>
                </nav>
                <div class="profile-content">
                    <div class="alert alert-success">
                        <p>
                            تم اضافة العقار بنجاح
                        </p>
                    </div>
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

