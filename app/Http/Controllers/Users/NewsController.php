<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\MenusServices;
use App\Models\News;
use App\Models\Sliders;
use App\Models\Webconfigs;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::orderBy('id', 'desc')->paginate(5);
        $webConfig = Webconfigs::find(1);
        $sliders = Sliders::all();
        $menus = MenusServices::whereNull('parent_id')->with('children')->get();
        return view('users.news.index', compact('news', 'webConfig', 'sliders', 'menus'));
    }
    public function detail(Request $request, $alias)
    {
        $news = News::where('alias', $alias)->firstOrFail();
        $webConfig = Webconfigs::find(1);
        $sliders = Sliders::all();
        $news->increment('views');
        $menus = MenusServices::whereNull('parent_id')->with('children')->get();
        $latestNews = News::orderBy('id', 'desc')->take(4)->get();
        return view('users.news.detail', compact('news', 'webConfig', 'sliders','latestNews', 'menus'));
    }
}
