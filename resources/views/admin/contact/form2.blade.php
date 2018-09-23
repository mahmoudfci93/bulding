
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
        اسم المرسل
    </label>
</div>
<div class="clearfix"></div>
<br>


<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::text("email",null,['class'=>'form-control']) !!}

        @if ($errors->has('email'))
            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
        @endif
    </div>

    <label class="col-md-2">
        البريد الالكترونى
    </label>
</div>
<div class="clearfix"></div>
<br>


<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::select("type",contact(),null,['class'=>'form-control']) !!}

        @if ($errors->has('type'))
            <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
        @endif
    </div>

    <label class="col-md-2">
        نوع الرسالة
    </label>
</div>
<div class="clearfix"></div>
<br>

<div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::textarea("message",null,['class'=>'form-control','rows'=>6]) !!}
        @if ($errors->has('message'))
            <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
        @endif
    </div>

    <label class="col-md-2">
      الرسالة
    </label>
</div>
<div class="clearfix"></div>
<br>