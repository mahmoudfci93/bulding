@extends('layouts.app')

@section('title')
    تسجيل عضوية جديدة
@endsection

@section('content')
    <div class="container">
        <div class="contact_bottom">
            <hr>
            <h3>
                تسجيل عضوية جديدة
            </h3>
            <hr>
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
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

                <div class="form-group">
                    <div class="col-md-8" style="float: right">
                        <button type="submit" class="btn btn-warning">
                            <i class="fa fa-btn fa-sign-up" style="color: #FFFFFF"></i>
                            تسجيل عضوية جديدة
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
