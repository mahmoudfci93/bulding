@extends('admin.layouts.layout')
@section('title')
    عرض الرسائل
@endsection

@section('header')
{!! Html::style('custom/css/select2.css') !!}
@endsection

@section('content')
    <section class="content-header">
        <h1>
            عرض الرسائل
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin-panel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{url('/admin-panel/contact')}}">رسائل الموقع</a></li>
            <li class="active"><a href="{{url('/admin-panel/contact/'.$contact->id.'/edit')}}">
                    عرض رسالة العضو :
                   {{$contact->name}}
                </a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            عرض رسالة العضو :
                            {{$contact->name}}
                        </h3>

                        {!!Form::model($contact,['route'=>['contact.update',$contact->id],'method'=>'PATCH'])!!}
                         @include('admin.contact.form2')
                        <div class="form-group" style="padding-bottom: 10px">
                            <div class="col-md-8"  style="float: right">
                                <button type="submit" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-user" style="color: #FFFFFF"></span>
                                تنفيذ
                                </button>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>

                </div>
            </div>
    </section>
@endsection

@section('footer')
    {!! Html::script('custom/js/select2.js') !!}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2({
                dir: "rtl"
            });

        });
    </script>

@endsection