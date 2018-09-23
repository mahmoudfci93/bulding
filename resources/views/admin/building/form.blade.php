
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::text("name",null,['class'=>'form-control']) !!}

        @if ($errors->has('name'))
            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
        @endif
    </div>

    <label class="col-md-2">
        اسم العقار
    </label>
    </div>
    <div class="clearfix"></div>
    <br>


<div class="form-group{{ $errors->has('rooms') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::select("rooms",roomNumber(),null,['class'=>'form-control select2']) !!}

        @if ($errors->has('rooms'))
            <span class="help-block">
                                        <strong>{{ $errors->first('rooms') }}</strong>
                                    </span>
        @endif
    </div>

    <label class="col-md-2">
        عدد الغرف
    </label>
</div>
<div class="clearfix"></div>
<br>

<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::text("price",null,['class'=>'form-control']) !!}

        @if ($errors->has('price'))
            <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
        @endif
    </div>
    <label class="col-md-2">
        سعرالعقار
    </label>
</div>
<div class="clearfix"></div>
<br>

    <div class="form-group{{ $errors->has('photos') ? ' has-error' : '' }}">
        <div class="col-lg-10">
            {{ Form::file('photos') }}
            @if ($errors->has('photos'))
                <span class="help-block">
                                        <strong>{{ $errors->first('photos') }}</strong>
                                    </span>
            @endif
        </div>
        <label class="col-md-2">
            صورالعقار
        </label>
    </div>


<div class="clearfix"></div>
<br>

<div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::select("place",bu_place(),null,['class'=>'form-control select2']) !!}

        @if ($errors->has('place'))
            <span class="help-block">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
        @endif
    </div>

    <label class="col-md-2">
        المنطقة
    </label>
</div>
<div class="clearfix"></div>
<br>

<div class="form-group{{ $errors->has('rent') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::select("rent",bu_rent(),null,['class'=>'form-control']) !!}

        @if ($errors->has('rent'))
            <span class="help-block">
                                        <strong>{{ $errors->first('rent') }}</strong>
                                    </span>
        @endif
    </div>

    <label class="col-md-2">
       نوع العملية
    </label>
</div>
<div class="clearfix"></div>
<br>

<div class="form-group{{ $errors->has('square') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::text("square",null,['class'=>'form-control']) !!}

        @if ($errors->has('square'))
            <span class="help-block">
                                        <strong>{{ $errors->first('square') }}</strong>
                                    </span>
        @endif
    </div>

    <label class="col-md-2">
        مساحة العقار
    </label>
</div>
<div class="clearfix"></div>
<br>

<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::select("type",bu_type(),null,['class'=>'form-control']) !!}

        @if ($errors->has('type'))
            <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
        @endif
    </div>

    <label class="col-md-2">
        نوع العقار
    </label>
</div>
<div class="clearfix"></div>
<br>
@if(!isset($user))
<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::select("status",bu_status(),null,['class'=>'form-control']) !!}

        @if ($errors->has('status'))
            <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
        @endif
    </div>

    <label class="col-md-2">
        حالة العقار
    </label>
</div>
<div class="clearfix"></div>
<br>
@endif

<div class="form-group{{ $errors->has('meta') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::text("meta",null,['class'=>'form-control']) !!}

        @if ($errors->has('meta'))
            <span class="help-block">
                                        <strong>{{ $errors->first('meta') }}</strong>
                                    </span>
        @endif
    </div>

    <label class="col-md-2">
        الكلمات الدلالية
    </label>
</div>
<div class="clearfix"></div>
<br>
@if(!isset($user))
<div class="form-group{{ $errors->has('small_desc') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::textarea("small_desc",null,['class'=>'form-control','rows'=>4]) !!}

        @if ($errors->has('small_desc'))
            <span class="help-block">
                                        <strong>{{ $errors->first('small_desc') }}</strong>
                                    </span>
        @endif
        <br>
        <div class="alert alert-warning">
            لا يمكن كتابة اكثر من 160 حرف طبقا لمعايير جوجل
        </div>
    </div>

    <label class="col-md-2">
        وصف العقار لمحركات البحث
    </label>
</div>
<div class="clearfix"></div>
<br>
@endif

<div class="form-group{{ $errors->has('langitude') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::text("langitude",null,['class'=>'form-control']) !!}

        @if ($errors->has('langitude'))
            <span class="help-block">
                                        <strong>{{ $errors->first('langitude') }}</strong>
                                    </span>
        @endif
    </div>

    <label class="col-md-2">
       خط الطول
    </label>
</div>
<div class="clearfix"></div>
<br>

<div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::text("latitude",null,['class'=>'form-control']) !!}

        @if ($errors->has('latitude'))
            <span class="help-block">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
        @endif
    </div>

    <label class="col-md-2">
        دائرة العرض
    </label>
</div>
<div class="clearfix"></div>
<br>

<div class="form-group{{ $errors->has('large_desc') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::textarea("large_desc",null,['class'=>'form-control']) !!}

        @if ($errors->has('large_desc'))
            <span class="help-block">
                                        <strong>{{ $errors->first('large_desc') }}</strong>
                                    </span>
        @endif
    </div>

    <label class="col-md-2">
      وصف مطول للعقار
    </label>
</div>
<div class="clearfix"></div>
<br>
