
{{ csrf_field() }}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <div class="col-md-8" style="float: right">
        {!! Form::text("name",null,['class'=>'form-control']) !!}

        @if ($errors->has('name'))
            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<br>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <div class="col-md-8" style="float: right">
        {!! Form::text("email",null,['class'=>'form-control']) !!}
        @if ($errors->has('email'))
            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
        @endif
    </div>
</div>
@if(!isset($userProfile))
<div class="form-group{{ $errors->has('is_admin') ? ' has-error' : '' }}">
    <div class="col-md-8" style="float: right">
        {!! Form::select("is_admin",['0'=>'user','1'=>'admin'],null,['class'=>'form-control']) !!}
        @if ($errors->has('is_admin'))
            <span class="help-block">
                                        <strong>{{ $errors->first('is_admin') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<br>
@endif
<div class="form-group" >
    <div class="col-md-8" style="float: right">
        <input id="password" type="password" class="form-control" name="password"  placeholder="كلمة المرور">

    </div>
</div>
<br>
<div class="form-group" style="padding-bottom: 10px">
    <div class="col-md-8" style="float: right">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="اعد كتابة كلمة المرور">
    </div>
</div>
<br>
<br>
<br>
<div class="form-group" style="padding-bottom: 10px">
    <div class="col-md-8"  style="float: right">
        <button type="submit" class="btn btn-warning">
            <span class="glyphicon glyphicon-user" style="color: #FFFFFF"></span>
تعديل بيانات العضو
        </button>
    </div>
</div>
