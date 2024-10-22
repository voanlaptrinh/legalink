<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\ArticlesService;
use App\Models\DetailPays;
use App\Models\Evaluations;
use App\Models\Images;
use App\Models\Introduces;
use App\Models\Members;
use App\Models\MenusServices;
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
        $detailPays = DetailPays::find(1); 
        $introduces = Introduces::find(1);
        $menus = MenusServices::whereNull('parent_id')->with('children')->get(); //Lấy các menu liên quan đến dịch vụ
        $members = Members::all();
        $questions = Questions::orderBy('id', 'desc')->take(6)->get();
        $evaluations = Evaluations::all();
        return view('users.home.index', compact('latestNews', 'webConfig', 'sliders', 'introduces', 'members', 'questions', 'evaluations', 'menus','detailPays'));
    }
    public function thuvien(Request $request)
    {
        $webConfig = Webconfigs::find(1);
        $detailPays = DetailPays::find(1);
        $sliders = Sliders::all();
        $images = Images::all();
        $menus = MenusServices::whereNull('parent_id')->with('children')->get();
        return view('users.thuvienanh.index', compact('webConfig', 'sliders', 'images', 'menus','detailPays'));
    }
    public function faqs(Request $request)
    {
        $webConfig = Webconfigs::find(1);
        $detailPays = DetailPays::find(1);
        $sliders = Sliders::all();
        $images = Images::all();
        $faqs = Questions::orderBy('id', 'desc')->get();
        $menus = MenusServices::whereNull('parent_id')->with('children')->get();
        return view('users.faq', compact('webConfig','faqs', 'sliders', 'images', 'menus','detailPays'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform search logic (e.g., matching 'title' field with query)
        $results = ArticlesService::where('name', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->paginate(5);
        $webConfig = Webconfigs::find(1);
        $detailPays = DetailPays::find(1);
        $sliders = Sliders::all();
        $latestNews = News::orderBy('id', 'desc')->take(4)->get();
        $menus = MenusServices::whereNull('parent_id')->with('children')->get(); //Lấy các menu liên quan đến dịch vụ
        // Return the view with search results and the query
        return view('users.search', compact('results', 'query','webConfig','sliders','menus','latestNews','detailPays'));
    }
}
