@extends('admin.layouts.layout')
@section('title')
    تعديل بيانات الاعضاء
@endsection

@section('header')
{!! Html::style('custom/css/select2.css') !!}
@endsection

@section('content')
    <section class="content-header">
        <h1>
تعديل العقارات
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin-panel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/admin-panel/buildings')}}">التحكم في العقارات</a></li>
            <li class="active"><a href="{{url('/admin-panel/buildings/'.$bu->id.'edit')}}">
                    تعديل العقار
                   {{$bu->name}}
                </a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            تعديل العقار:
                            {{$bu->name}}
                        </h3>

                        {!!Form::model($bu,['route'=>['buildings.update',$bu->id],'method'=>'PATCH','enctype'=>'multipart/form-data','files'=>true])!!}
                         @include('admin.building.form2')

                        <div class="form-group" style="padding-bottom: 10px">
                            <div class="col-md-8"  style="float: right">
                                <button type="submit" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-user" style="color: #FFFFFF"></span>
                                   حفظ التعديل
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