@extends('admin.layouts.layout')
@section('title')
    اضافة عقار جديد
@endsection

@section('header')
    {!! Html::style('custom/css/select2.css') !!}
@endsection

@section('content')
    <section class="content-header">
        <h1>
            اضافة عقار جديد
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin-panel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/admin-panel/buildings')}}">التحكم في العقارات</a></li>
            <li class="active"><a href="{{url('/admin-panel/buildings/create')}}">اضافة عقار </a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">اضافة عقار جديد</h3>
                        {!! Form::open(['url'=>'/admin-panel/buildings','method'=>'post','files'=>true]) !!}
                        @include('admin.building.form')

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