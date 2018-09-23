
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <div class="col-md-8" style="float: right">
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="اسم المستخدم">

            @if ($errors->has('name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="col-md-8" style="float: right">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="البريد الإلكترونى">

            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <div class="col-md-8" style="float: right">
            <input id="password" type="password" class="form-control" name="password" required placeholder="كلمة المرور">

            @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8" style="float: right">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="اعد كتابة كلمة المرور">
        </div>
    </div>

    <div class="form-group" style="padding-bottom: 10px">
        <div class="col-md-8"  style="float: right">
            <button type="submit" class="btn btn-warning">
                <span class="glyphicon glyphicon-user" style="color: #FFFFFF"></span>
                إضافـة عضـو جديـد
            </button>
        </div>
    </div>
