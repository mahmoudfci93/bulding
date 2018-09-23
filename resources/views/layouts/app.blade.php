<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Html::style('website/css/bootstrap.min.css') !!}
    {!! Html::style('website/css/flexslider.css') !!}
    {!! Html::style('website/css/style.css') !!}
    {!! Html::style('website/css/font-awesome.min.css') !!}
    {!! Html::script('website/js/jquery.min.js') !!}
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    <title>
        {{getSettings()}}
        |
        @yield('title')
    </title>
    {!! Html::style('custom/css/select2.css') !!}
    {!! Html::style('custom/css/fonts.css') !!}
    @yield('header')
</head>
<body id="app-layout" style="direction: rtl">
<div class="header">
    <div class="container"> <a class="navbar-brand" href="{{url('/')}}"><i class="fa fa-paper-plane"></i> ONE</a>
        <div class="menu pull-left"> <a class="toggleMenu" href="#"><img src="{{Request::root()}}website/images/nav_icon.png" alt="" /> </a>
            <ul class="nav" id="nav">
                <li class="current"><a href="{{url('/home')}}">الرئيسية</a></li>
                <li class=""><a href="{{url('/ShowAllBuildings')}}">كل العقارات</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        إيجار <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        @foreach(bu_type() as $key=>$type)
                        <li style="width: 100%">
                            <a href="{{ url('/search?rent=1&&type='.$key)}}">{{$type}}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        تمليك <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        @foreach(bu_type() as $key=>$type)
                            <li style="width: 100%">
                                <a href="{{ url('/search?rent=0&&type='.$key)}}">{{$type}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{url('/contact')}}">إتصل بنا</a></li>
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">تسجيل الدخول</a></li>
                    <li><a href="{{ route('register') }}">عضوية جديدة</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    تسجيل الخروج
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
                <div class="clear"></div>
            </ul>

        </div>
    </div>
</div>

@yield('content')

<div class="footer">
    <div class="footer_bottom">
        <div class="follow-us">
            <a class="fa fa-facebook social-icon" href="{{getSettings('facebook')}}"></a>
            <a class="fa fa-twitter social-icon" href="{{getSettings('twitter')}}"></a>
            <a class="fa fa-youtube social-icon" href="{{getSettings('youtube')}}"></a>
        </div>
        <div class="copy">
            <p>Copyright &copy; 2015 Company Name. Design by <a href="http://www.templategarden.com" rel="nofollow">TemplateGarden</a></p>
        </div>
    </div>
</div>

{!! Html::script('website/js/bootstrap.min.js') !!}
{!! Html::script('website/js/jquery.flexslider.js') !!}
{!! Html::script('website/js/responsive-nav.js') !!}
{!! Html::script('custom/js/select2.js') !!}
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2({
            dir: "rtl"
        });

    });
</script>
@yield('footer')
</body>
</html>
