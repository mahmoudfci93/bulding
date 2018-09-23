<?php
function getSettings($settingname = 'sitename')
{
    return \App\SiteSetting::where('nameSetting',$settingname)->get()[0]->value;
}
function noImage()
{
    //return getSettings('noImage');

}
function bu_type()
{
   $array =[
       'شقة',
       'فيلا',
       'شالية'
   ];
    return $array;
}
function bu_rent()
{
    $array =[
        'تمليك',
        'ايجار',
    ];
    return $array;
}

function bu_status()
{
    $array =[
        '  غير مفعل',
        ' مفعل',
    ];
    return $array;
}

function roomNumber()
{
    $array =[];
    for ($i = 2 ; $i<30 ; $i++){
        $array[$i] = $i;
    }
    return $array;
}
function searchNameField()
{
    return[
        'price'=>'سعر العقار',
        'place'=>'منطقة العقار',
        'rooms'=>'عدد الغرف',
        'type'=>'نوع العقار',
        'rent'=>'نوع العملية',
        'square'=>'المساحة',
        'price_from'=>'السعر من',
        'price_to'=>'السعر إلى'
    ];
}
function bu_place()
{
    return [
        "c-1"=>"القاهرة",
        "c-2"=>"الاسكندرية",
        "c-3"=>"الاقصر",
        "c-4"=>"قنا",
        "c-5"=>"المنيا",
        "c-6"=>"الشرقية",
        "c-7"=>"الزقازيق",
        "c-8"=>"القليوبية",
        "c-9"=>"الجيزة",
        "c-10"=>"مرسي مطروح",
        "c-11"=>"الاسماعيلية",
        "c-12"=>"المنصورة",
        "c-13"=>"الدقهلية",
        "c-14"=>"الغربية",
        "c-15"=>"المحلة",
        "c-16"=>"اسوان",
    ];
}

function contact()
{
    return [
        '1' => 'اعجاب',
        '2' => 'مشكلة',
        '3' => 'اقتراح',
        '4' => 'استفسار'
    ];
}
function unreadMessages()
{
    return \App\Contact::where('view',null)->get();
}
function countUnreadMessages()
{
    return \App\Contact::where('view',null)->count();
}

