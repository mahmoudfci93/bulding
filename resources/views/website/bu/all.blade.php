@extends('layouts.app')

@section('title')
    كل العقارات
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
                        @if(isset($array))
                            @if(!empty($array))
                                @foreach($array as $key=>$value)
                                  <li><a href="{{url('/search?'.$key.'='.$value)}}">{{searchNameField()[$key]}} ->
                                      @if($key =='type')
                                          {{bu_type()[$value]}}
                                      @elseif($key =='rent')
                                              {{bu_rent()[$value]}}
                                       @elseif($key=='place')
                                          {{bu_place()[$value]}}
                                      @else
                                          {{$value}}
                                      @endif
                                      </a></li>
                                @endforeach
                            @endif
                        @endif
                    </ol>
                </nav>
                <div class="profile-content">
                    @include('website.bu.sharefile',['bus'=>$showAll])
                    <div class="text-center">
                        {{$showAll->appends(Request::except('page'))->render()}}
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

