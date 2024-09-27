<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Images;
use App\Models\Introduces;
use App\Models\Members;
use App\Models\News;
use App\Models\Questions;
use App\Models\Sliders;
use App\Models\Webconfigs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $latestNews = News::orderBy('id', 'desc')->take(4)->get();
        $webConfig = Webconfigs::find(1);
        $sliders = Sliders::all();
        $introduces = Introduces::find(1);
        $members = Members::all();
        $questions = Questions::orderBy('id', 'desc')->take(4)->get();
        return view('users.home.index', compact('latestNews', 'webConfig', 'sliders','introduces','members','questions'));
    }
    public function thuvien(Request $request)
    {
        $webConfig = Webconfigs::find(1);
        $sliders = Sliders::all();
        $images = Images::all();
        return view('users.thuvienanh.index', compact( 'webConfig', 'sliders','images'));
    }

}
