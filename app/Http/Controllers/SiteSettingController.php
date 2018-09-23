<?php

namespace App\Http\Controllers;

use App\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class SiteSettingController extends Controller
{
    public function index()
    {
        $siteSettings = SiteSetting::all();
        return view('admin.siteSetting.index', compact('siteSettings'));
    }

    public function store(Request $request ,SiteSetting $siteSetting)
    {


        foreach (array_except($request->toArray(), ['_token','submit']) as $key => $req) {
            $siteSettingUpdate = $siteSetting->where('nameSetting', $key)->get()[0];
            if ($siteSettingUpdate->type != 3)
            {
                $siteSettingUpdate->fill(['value' => $req])->save();
            }

            }

        return Redirect::back();
    }

}
