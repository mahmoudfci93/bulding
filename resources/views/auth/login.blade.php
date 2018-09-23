@extends('layouts.app')

@section('title')
    صفحة تسجيل الدخول
@endsection

@section('content')
    <div class="container">
        <div class="contact_bottom">
            <hr>
            <h3>
                تسجيل الدخول
            </h3>
            <hr>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="text2{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-md-8" style="float: right; margin-bottom: 5px">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="البريد الإلكترونى">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-md-8" style="float: right; margin-bottom: 5px">
                        <input id="password" type="password" class="form-control" name="password" required placeholder="كلمة المرور">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="text2">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" style="float: right;margin-left: 10px" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                تذكرنى؟
                            </label>
                        </div>
                    </div>
                </div>

                <div class="text2">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-warning">
                            <i class="fa fa-btn fa-sign-in" style="color: #FFFFFF"></i>
                            تسجيل الدخول
                        </button>

                        <a class="banner_btn" href="{{ route('password.request') }}">
                            هل نسيت كلمة المرور ؟
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix">

        </div>
        <br>
    </div>
@endsection
