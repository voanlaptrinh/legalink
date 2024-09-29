<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\ArticlesService;
use App\Models\Introduces;
use App\Models\MenusServices;
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
         // Tìm menu theo alias
         $menu = MenusServices::where('alias', $alias)->with('children')->firstOrFail();
 
         // Lấy tất cả các menu con (nếu có)
         $subMenuIds = $menu->children->pluck('id')->toArray();
 
         // Gộp ID của menu hiện tại với các menu con
         $menuIds = array_merge([$menu->id], $subMenuIds);
 
         // Lấy các bài viết thuộc về menu hiện tại và các menu con
         $articles = ArticlesService::whereIn('menus_services_id', $menuIds)->get();
 
         // Nếu chỉ có một bài viết, điều hướng tới trang chi tiết bài viết
         if ($articles->count() === 1) {
             return redirect()->route('articles.show', ['alias' => $articles->first()->alias]);
         }
 
         return view('users.articles.list', compact('menu', 'articles'));
     }
 
     // Hiển thị chi tiết bài viết
     public function showArticle($alias)
     {
         // Tìm bài viết theo alias
         $article = ArticlesService::where('alias', $alias)->firstOrFail();
         $webConfig = Webconfigs::find(1);
         $sliders = Sliders::all();
         $menus = MenusServices::whereNull('parent_id')->with('children')->get();
         return view('users.articles.detail', compact('article','webConfig','sliders','menus'));
     }
}
