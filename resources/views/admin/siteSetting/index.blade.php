@extends('admin.layouts.layout')
@section('title')
    تعديل إعدادات الموقع
@endsection

@section('headder')

@endsection

@section('content')
    <section class="content-header">
        <h1>
            تعديل إعدادات الموقع
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin-panel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{url('/admin-panel/siteSettings')}}">تعديل إعدادات الموقع </a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">تعديل إعدادات الموقع</h3>
                    {!! Form::open(['route'=>'siteSetting.store','method'=>'POST','file'=>true]) !!}
                        @foreach($siteSettings as $siteSetting)

                            <div class="form-group{{ $errors->has($siteSetting->nameSetting) ? ' has-error' : '' }}">
                                <div class="col-lg-2" style="float: right">

                                    {{$siteSetting->slug}}
                                </div>
                                <div class="col-md-9" style="float: left">
                                    @if($siteSetting->type == 0)
                                        {!! Form::text($siteSetting->nameSetting,$siteSetting->value,['class'=>'form-control ']) !!}
                                    @elseif($siteSetting->type == 3)
                                        {!! Form::file($siteSetting->nameSetting) !!}
                                    @else
                                        {!! Form::textarea($siteSetting->nameSetting,$siteSetting->value,['class'=>'form-control']) !!}
                                    @endif
                                    @if ($errors->has($siteSetting->nameSetting))
                                        <span class="help-block">
                                        <strong>{{ $errors->first($siteSetting->nameSetting) }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                        <div class="clearfix"></div>
                            <br>
                        @endforeach
                        <button name="submit" type="submit" class="btn btn-app">
                            <i class="fa fa-save"></i>
                            حفظ إعدادات الموقع
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