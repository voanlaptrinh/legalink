<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Introduces;
use App\Models\Members;
use App\Models\Sliders;
use App\Models\Webconfigs;
use Illuminate\Http\Request;

class IntroduceController extends Controller
{
    public function index(Request $request)
    {
        $members = Members::orderBy('id', 'desc')->get();
        $webConfig = Webconfigs::find(1);
        $sliders = Sliders::all();
        $introduces = Introduces::find(1);
      
        return view('users.introduce.index', compact('members', 'webConfig', 'sliders','introduces'));
    }
}
