<div class="col-md-3">
    @if(\Illuminate\Support\Facades\Auth::user())
    <div class="profile-sidebar">
        <h3 class="text-center">خيارات العضو</h3>
        <div class="profile-usermenu">
            <ul class="nav" style="    padding-right: 0px">
                <li class="active">
                    <a href="{{url('/user/edit/user')}}">
                        <i class="glyphicon glyphicon-home"></i>
تعديل المعلومات الشخصية
                    </a>
                </li>
                <li>
                    <a href="{{url('/user/show/building')}}">
                        <i class="glyphicon glyphicon-user"></i>
                        عقاراتى
                    </a>
                </li>
                <li>
                    <a href="{{url('/user/create/building')}}">
                        <i class="glyphicon glyphicon-ok"></i>
                        اضف عقار جديد
                    </a>
                </li>
            </ul>
        </div>
        <!-- END MENU -->
    </div>
    <br>
@endif
    <div class="profile-sidebar">
        <h3 class="text-center">خيارات العقارات</h3>
        <div class="profile-usermenu">
            <ul class="nav" style="    padding-right: 0px">
                <li class="active">
                    <a href="{{url('/ShowAllBuildings')}}">
                        <i class="glyphicon glyphicon-home"></i>
                        كل العقارات
                    </a>
                </li>
                <li>
                    <a href="{{url('/ForRent')}}">
                        <i class="glyphicon glyphicon-user"></i>
                        إيجار
                    </a>
                </li>
                <li>
                    <a href="{{url('/ForBuy')}}">
                        <i class="glyphicon glyphicon-ok"></i>
                        تمليك
                    </a>
                </li>

                <li>
                    <a href="{{url('/type/0')}}">
                        <i class="glyphicon glyphicon-ok"></i>
                        شقة
                    </a>
                </li>

                <li>
                    <a href="{{url('/type/1')}}">
                        <i class="glyphicon glyphicon-ok"></i>
                        فيلا
                    </a>
                </li>

                <li>
                    <a href="{{url('/type/2')}}">
                        <i class="glyphicon glyphicon-ok"></i>
                        شالية
                    </a>
                </li>

            </ul>
        </div>
        <!-- END MENU -->
    </div>
    <br>
    <div class="profile-sidebar" style="margin-bottom: 25px">
        <h3 class="text-center">خيارات البحث</h3>
        <div class="profile-usermenu">
            {!! Form::open(['url'=>'search','method'=>'get']) !!}
            <ul class="nav" style="padding-right: 10px;padding-left: 10px;">
                <li class="itemsearch">
                    {!! Form::text('price_from',null,['class'=>'form-control','placeholder'=>' سعر العقار من']) !!}
                </li>
                <li class="itemsearch">
                    {!! Form::text('price_to',null,['class'=>'form-control','placeholder'=>'سعر العقار إلى']) !!}
                </li>
                <li class="itemsearch">
                    {!! Form::select('place',bu_place(),null,['class'=>'form-control select2','placeholder'=>'منطقة العقار']) !!}
                </li>
                <li class="itemsearch">
                    {!! Form::select('rooms',roomNumber(),null,['class'=>'form-control','placeholder'=>'عدد الغرف ']) !!}
                </li>
                <li class="itemsearch">
                    {!! Form::select('type',bu_type(),null,['class'=>'form-control','placeholder'=>'نوع العقار']) !!}
                </li>
                <li class="itemsearch">
                    {!! Form::select('rent',bu_rent(),null,['class'=>'form-control','placeholder'=>'نوع العملية']) !!}
                </li>
                <li>
                    {!! Form::text('square',null,['class'=>'form-control','placeholder'=>'مساحة العقار']) !!}
                </li>
                <li>
                    {!! Form::submit('ابحث',['class'=>'banner_btn']) !!}
                </li>
            </ul>
        </div>
    {!! Form::close() !!}
    <!-- END MENU -->
    </div>

</div>