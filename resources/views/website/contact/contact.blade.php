@extends('layouts.app')

@section('title')
    اتصل بنا
@endsection

@section('header')
    {!! Html::style('custom/buall.css') !!}
    <style>
        .input-group-addon:first-child
        {
            border-left:0px;
            border-right:1px solid #ccc;
        }
    </style>
@endsection

@section('content')
    <br>
    <br>
<div class="container">
    <h1>اتصل بنا</h1>
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                {!! Form::open(['url'=>'/contact','method'=>'post']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    الرسالة</label>
                                <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                          placeholder="الرسالة"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    الاسم</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="ادخل الاسم" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    البريد الالكتروني</label>
                                <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="ادخل البريد الالكترونى" value="{{\Illuminate\Support\Facades\Auth::user()? \Illuminate\Support\Facades\Auth::user()->email : ''}}" required="required" /></div>
                            </div>
                            <div class="form-group">
                                <label for="subject">
                                    العنوان</label>
                                <select id="type" name="type" class="form-control" required="required">
                               @foreach(contact() as $key=>$con)
                                    <option value="{{$key}}">{{$con}}</option>
                               @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-baner pull-right" id="btnContactUs">
                               ارسل الرسالة</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-4">
            <form>
                <legend><i class="fa fa-outdent"></i> مكتبنا</legend>
                <address>
                    {{nl2br(getSettings('address'))}}<br>
                    <abbr title="Phone">
                        ت:</abbr>
                    {{nl2br(getSettings('mobile'))}}
                </address>
                <address>
                    <strong>{{nl2br(getSettings('sitename'))}}</strong><br>
                    <a href="mail:">{{nl2br(getSettings('email'))}}</a>
                </address>
            </form>
        </div>
    </div>
</div>
@endsection