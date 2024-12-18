<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\DetailPays;
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
        $detailPays = DetailPays::find(1);
        $sliders = Sliders::all();
        $menus = MenusServices::whereNull('parent_id')->with('children')->get();
    
        if ($request->ajax()) {
            return view('users.news.news_list', compact('news'))->render(); // Render only news for AJAX
        }
    
        return view('users.news.index', compact('news', 'webConfig', 'sliders', 'menus', 'detailPays'));
    }
        public function detail(Request $request, $alias)
    {
        $news = News::where('alias', $alias)->firstOrFail();
        $webConfig = Webconfigs::find(1);
        $sliders = Sliders::all();
        $news->increment('views');
        $detailPays = DetailPays::find(1);
        $menus = MenusServices::whereNull('parent_id')->with('children')->get();
        $latestNews = News::orderBy('id', 'desc')->take(4)->get();
        return view('users.news.detail', compact('news', 'webConfig', 'sliders','latestNews', 'menus','detailPays'));
    }
}
