<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\DetailPays;
use App\Models\Introduces;
use App\Models\Members;
use App\Models\MenusServices;
use App\Models\Sliders;
use App\Models\Webconfigs;
use Illuminate\Http\Request;

class IntroduceController extends Controller
{
    public function index(Request $request)
    {
        $members = Members::orderBy('id', 'desc')->get();
        $webConfig = Webconfigs::find(1);
        $detailPays = DetailPays::find(1);
        $sliders = Sliders::all();
        $introduces = Introduces::find(1);
        $menus = MenusServices::whereNull('parent_id')->with('children')->get();

        return view('users.introduce.index', compact('members', 'webConfig', 'sliders','introduces','menus','detailPays'));
    }
}
