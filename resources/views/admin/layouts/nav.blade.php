<li class="treeview">
    <a href="#">
        <i class="fa fa-dashboard pull-right"></i>
        <span class="pull-right" style="margin-right: 10px;">إعدادات الموقع</span>
        <i class="fa fa-angle-right pull-left"></i>
        <div class="clearfix"></div>
    </a>
    <ul class="treeview-menu">
        <li class="active"><a href="{{route('siteSetting.index')}}"><i class="fa fa-circle-o"></i> إعدادات رئيسية</a></li>
        <li><a href="index2.html"><i class="fa fa-circle-o"></i>إعدادات أخرى</a></li>
    </ul>
</li>
{{-- users --}}
<li class="treeview">
    <a href="#">
        <i class="fa fa-users pull-right"></i>
        <span class="pull-right" style="margin-right: 10px;">التحكم فى الاعضاء</span>
        <i class="fa fa-angle-right pull-left"></i>
        <div class="clearfix"></div>
    </a>
    <ul class="treeview-menu">
        <li class="active"><a href="{{url('admin-panel/users/create')}}"><i class="fa fa-circle-o"></i>اضف عضو</a></li>
        <li><a href="{{url('admin-panel/users')}}"><i class="fa fa-circle-o"></i>كل الأعضاء</a></li>
    </ul>
</li>
{{-- buildings --}}
<li class="treeview">
    <a href="#">
        <i class="fa fa-users pull-right"></i>
        <span class="pull-right" style="margin-right: 10px;">التحكم فى العقارات</span>
        <i class="fa fa-angle-right pull-left"></i>
        <div class="clearfix"></div>
    </a>
    <ul class="treeview-menu">
        <li class="active"><a href="{{url('admin-panel/buildings/create')}}"><i class="fa fa-circle-o"></i>اضف عقار</a></li>
        <li><a href="{{url('admin-panel/buildings')}}"><i class="fa fa-circle-o"></i>كل العقارات</a></li>
    </ul>
</li>

{{-- Contacts --}}
<li class="treeview">
    <a href="#">
        <i class="fa fa-users pull-right"></i>
        <span class="pull-right" style="margin-right: 10px;">رسائل الموقع</span>
        <i class="fa fa-angle-right pull-left"></i>
        <div class="clearfix"></div>
    </a>
    <ul class="treeview-menu">
        <li class="active"><a href="{{url('admin-panel/contact')}}"><i class="fa fa-circle-o"></i>رسائل الموقع</a></li>
    </ul>
</li>