@extends('layouts.app')
@section('title')
    أهلا بك زائرنا الكريم
@endsection

@section('header')
    {!! Html::style('main/css/reset.css') !!}
    {!! Html::style('main/css/style.css') !!}   <!-- Resource style -->
    {!! Html::script('main/js/modernizr.js') !!}<!-- Modernizr -->

@endsection
@section('content')
    <div class="banner text-center">
        <div class="container">
            <div class="banner-info">
                <h1>أهلاً بك فى
                    {{getSettings()}}
                </h1>
                <p>


                {!! Form::open(['url'=>'search','method'=>'get']) !!}
                   <div class="row">
                       <div class="col-lg-3">
                           {!! Form::text('price_from',null,['class'=>'form-control','placeholder'=>' سعر العقار من']) !!}
                       </div>
                       <div class="col-lg-3">
                           {!! Form::text('price_to',null,['class'=>'form-control','placeholder'=>'سعر العقار إلى']) !!}
                       </div>
                       <div class="col-lg-3">
                           {!! Form::select('rooms',roomNumber(),null,['class'=>'form-control select2','placeholder'=>'عدد الغرف ']) !!}
                       </div>
                       <div class="col-lg-3">
                           {!! Form::select('type',bu_type(),null,['class'=>'form-control','placeholder'=>'نوع العقار']) !!}
                       </div>
                   </div>
                <br>
                   <div class="row">
                       <div class="col-lg-3">
                           {!! Form::submit('ابحث',['class'=>'btn','style'=>'width:100%']) !!}
                       </div>
                       <div class="col-lg-3">
                           {!! Form::select('place',bu_place(),null,['class'=>'form-control select2','placeholder'=>'منطقة العقار']) !!}
                       </div>
                       <div class="col-lg-3">
                           {!! Form::select('rent',bu_rent(),null,['class'=>'form-control','placeholder'=>'نوع العملية']) !!}
                       </div>
                       <div class="col-lg-3">
                           {!! Form::text('square',null,['class'=>'form-control','placeholder'=>'مساحة العقار']) !!}
                       </div>
                   </div>

            {!! Form::close() !!}
                </p>
                <a class="banner_btn" href="{{url('/user/create/building')}}">اضف عقار مجاناً</a> </div>
        </div>
    </div>

    <div class="main">
        <ul class="cd-items cd-container">
            @foreach(\App\Building::where('status',1)->get() as $bu)
            <li class="cd-item">
                @if($bu->photo == '')
                    <img src="{{asset('/main/img/item-1.jpg')}}" style="width: 257px;height: 290px;">
                @else
                    <img src="{{url('uploads',$bu->photo->name)}}" style="width: 257px;height: 290px;">
                @endif
                <a href="#0" data-id="{{$bu->id}}" class="cd-trigger">نبذة سريعة</a>
            </li> <!-- cd-item -->
            @endforeach
        </ul> <!-- cd-items -->

        <div class="cd-quick-view">
            <div class="cd-slider-wrapper">
                <ul class="cd-slider">
                    <li><img  class="imgBox" src="" alt="Product 1" style="width: 300px;height: 198px"></li>

                </ul> <!-- cd-slider -->
            </div> <!-- cd-slider-wrapper -->

            <div class="cd-item-info">
                <h2 class="titleBox"></h2>
                <p class="discBox"></p>

                <ul class="cd-item-action">
                    <li><a href="" class="add-to-cart priceBox"></a></li>
                    <li><a href="#0" class="moreBox">اقرأ المزيد</a></li>
                </ul> <!-- cd-item-action -->
            </div> <!-- cd-item-info -->
            <a href="#0" class="cd-close">Close</a>
        </div> <!-- cd-quick-view -->



    </div>
@endsection

@section('footer')
        <script src="{{Request::root()}}/main/js/jquery-2.1.1.js"></script>
        <script src="{{Request::root()}}/main/js/velocity.min.js"></script>
        <script>
            function homeURL() {
                return '{{Request::root()}}';
            }
        </script>
        <script src="{{Request::root()}}/main/js/main.js"></script>
@endsection
