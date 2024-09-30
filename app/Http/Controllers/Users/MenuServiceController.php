<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\ArticlesService;
use App\Models\Introduces;
use App\Models\MenusServices;
use App\Models\News;
use App\Models\Sliders;
use App\Models\Webconfigs;
use Illuminate\Http\Request;

class MenuServiceController extends Controller
{
    // Hiển thị tất cả các menu trên trang chủ
    //  public function index()
    //  {
    //      // Lấy tất cả các menu cha (parent_id null là menu cha)
    //      $menus = MenuService::whereNull('parent_id')->with('children')->get();

    //      return view('home', compact('menus'));
    //  }

    // Hiển thị bài viết khi nhấn vào menu
    public function showMenu($alias)
    {
        $menu = MenusServices::where('alias', $alias)->with('children')->firstOrFail();
        $webConfig = Webconfigs::find(1);
        // Lấy tất cả các menu con (nếu có)
        $subMenuIds = $menu->children->pluck('id')->toArray();

        // Gộp ID của menu hiện tại với các menu con
        $menuIds = array_merge([$menu->id], $subMenuIds);
        $latestNews = News::orderBy('id', 'desc')->take(4)->get();
        // Lấy các bài viết thuộc về menu hiện tại và các menu con
        $articles = ArticlesService::whereIn('menus_services_id', $menuIds)->paginate(10);
        $sliders = Sliders::all();
        // Kiểm tra xem có bài viết nào không
        if ($articles->isEmpty()) {
            return redirect()->back()->with('error', 'Không có bài viết nào cho menu này.');
        }
        $menus = MenusServices::whereNull('parent_id')->with('children')->get();
        // Nếu chỉ có một bài viết, điều hướng tới trang chi tiết bài viết
        if ($articles->count() === 1) {
            $article = $articles->first();
            return redirect()->route('articles.show', ['alias' => $article->alias]);
        }

        // Trả về view danh sách bài viết nếu có nhiều hơn một bài
        return view('users.articles.list', compact('menu','sliders', 'articles','latestNews','webConfig','menus'));
    }

    // Hiển thị chi tiết bài viết
    public function showArticle($alias)
    {
        // Tìm bài viết theo alias
        $article = ArticlesService::where('alias', $alias)->firstOrFail();
        $webConfig = Webconfigs::find(1);
        $sliders = Sliders::all();
        $article->increment('views');
        $menus = MenusServices::whereNull('parent_id')->with('children')->get();
        return view('users.articles.detail', compact('article', 'webConfig', 'sliders', 'menus'));
    }
}
