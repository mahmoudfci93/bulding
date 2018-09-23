@extends('layouts.app')

@section('title')
    العقار
    {{$bu->name}}
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
        .slider {
            width: 500px;
            height: 200px;
            border: 25px;
            padding: 25px;
            margin: 79px;
            margin-top: 0;
            position: static;
        }

    </style>
@endsection

@section('content')

    <div class="container">
        <div class="row profile">
            <div class="col-md-9">
                <nav aria-label="breadcrumb" style="padding-top: 22px">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                        <li><a href="{{url('/ShowAllBuildings')}}">كل العقارات</a> </li>
                        <li><a href="{{url('/singleBuilding/'.$bu->id)}}">{{$bu->name}}</a> </li>
                    </ol>
                </nav>
    <div class="profile-content">
                   <h1>
                       {{$bu->name}}
                   </h1>
                    <hr>
             <div class="btn-group" role="group">
                    <a href="{{url('/search?price='.$bu->price)}}" class="btn btn-default">
                        السعر
                        :
                        {{$bu->price}}
                    </a>
                 <a href="{{url('/search?square='.$bu->square)}}" class="btn btn-default">
                        المساحة
                        :
                        {{$bu->square}}
                    </a>
                 <a href="{{url('/search?place='.$bu->place)}}" class="btn btn-default">
                        المنطقة
                        :
                        {{bu_place()[$bu->place]}}
                    </a>
                 <a href="{{url('/search?rooms='.$bu->rooms)}}" class="btn btn-default">
                        عدد الغرف
                        :
                            {{$bu->rooms}}
                        </a>
                 <a href="{{url('/search?type='.$bu->type)}}" class="btn btn-default">
                        نوع العقار
                        :
                                {{bu_type()[$bu->type]}}
                    </a>
                 <a href="{{url('/search?rent='.$bu->rent)}}" class="btn btn-default">
                        نوع العملية
                        :
                        {{bu_rent()[$bu->rent]}}
                    </a>

             </div>
                    <hr>

        <div class="slider" >

            @if($bu->photo == '')
                <img src="{{asset('/main/img/item-1.jpg')}}" style="width: 300px;height: 250px;">
            @else
                <img src="{{url('uploads',$bu->photo->name)}}" style="width: 200px;height: 200px;">
            @endif

        </div>

                    <p>
                        {!! nl2br($bu->large_desc) !!}
                    </p>
        <hr>

                </div>
                <br>

                <div class="profile-content">
                    <h3>
                        عقارات أخرى قد تهمك
                    </h3>
                    @include('website.bu.sharefile',['bus'=>$sameRent])
                    @include('website.bu.sharefile',['bus'=>$sameType])
                </div>
            </div>
            <br>


            @include('website.bu.pages')
        </div>

    </div>
    <br>
    <br>

@endsection

@section('footer')





@endsection



<!--
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

