<?php

use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\IntroducesController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\DashboadController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\WebConfigController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\Users\ContactsControler;
use App\Http\Controllers\Users\HomeController;
use App\Http\Controllers\Users\IntroduceController;
use App\Http\Controllers\Users\MembersControler;
use App\Http\Controllers\Users\NewsController as UsersNewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('/upload-image', action: [UploadController::class, 'uploadImage'])->name('upload-image');

Route::get('/',  [HomeController::class, 'index'])->name('home');
Route::get('/tin-tuc', [UsersNewsController::class, 'index'])->name('news');
Route::get('/thu-vien-anh', [HomeController::class, 'thuvien'])->name( 'thuvien');
Route::get('/{alias}/chi-tiet', [UsersNewsController::class, 'detail'])->name('news.chi');

Route::get('gioi-thieu', [IntroduceController::class, 'index'])->name('introduce');
Route::get('nhan-su', [MembersControler::class, 'index'])->name('members');
Route::get('lien-he', [ContactsControler::class, 'index'])->name('contacts');
Route::post('lienhe/store', [ContactsControler::class, 'store'])->name('contacts.store');

Route::prefix('/admin')->group(function () {
    Route::get('/',  [DashboadController::class, 'dashboard'])->name('admin.dashboard');

    Route::prefix('/news')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('news.index');
        Route::get('/create', [NewsController::class, 'create'])->name('news.create');
        Route::post('/store', [NewsController::class, 'store'])->name('news.store');
        Route::get('/{alias}/edit', [NewsController::class, 'edit'])->name('news.edit');
        Route::get('/{alias}/detail', [NewsController::class, 'detail'])->name('news.detail');
        Route::put('/{id}', [NewsController::class, 'update'])->name('news.update');
        Route::delete('delete/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
    });
    Route::prefix('/members')->group(function () {
        Route::get('/', [MemberController::class, 'index'])->name('members.index');
        Route::get('/create', [MemberController::class, 'create'])->name('members.create');
        Route::post('/store', [MemberController::class, 'store'])->name('members.store');
        Route::get('/{alias}/edit', [MemberController::class, 'edit'])->name('members.edit');
        Route::get('/{alias}/detail', [MemberController::class, 'detail'])->name('members.detail');
        Route::put('/{id}', [MemberController::class, 'update'])->name('members.update');
        Route::delete('delete/{id}', [MemberController::class, 'destroy'])->name('members.destroy');
   
    });
    Route::prefix('/sliders')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('sliders.index');
        Route::get('/create', [SliderController::class, 'create'])->name('sliders.create');
        Route::post('/store', [SliderController::class, 'store'])->name('sliders.store');
        Route::get('/{id}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
        Route::put('/{id}', [SliderController::class, 'update'])->name('sliders.update');
        Route::delete('delete/{id}', [SliderController::class, 'destroy'])->name('sliders.destroy');
    });
    Route::prefix('/web_config')->group(function () {
        Route::get('/', [WebConfigController::class, 'index'])->name('webConfig.index');
        Route::post('/update-webConfig', [WebConfigController::class, 'update'])->name('webConfig.update');
    });
    Route::prefix('/introduces')->group(function () {
        Route::get('/', [IntroducesController::class, 'index'])->name('introduce.index');
        Route::post('/update-introducts', [IntroducesController::class, 'update'])->name('introduce.update');
    });
    Route::prefix('/thu-vien-anh')->group(function () {
        Route::get('/', [ImagesController::class, 'index'])->name('images.admin');
        Route::get('/create', [ImagesController::class, 'create'])->name('images.create');
        Route::post('/store', [ImagesController::class, 'store'])->name('images.store');
        Route::get('/{id}/edit', [ImagesController::class, 'edit'])->name('images.edit');
        Route::put('/{id}', [ImagesController::class, 'update'])->name('images.update');
        Route::delete('delete/{id}', [ImagesController::class, 'destroy'])->name('images.destroy');
    });
    Route::prefix(('/lien-he'))->group(function () {
        Route::get('/', [ContactsController::class, 'index'])->name('contacts.index');
    });
    Route::prefix('/cau-hoi')->group(function () {
        Route::get('/', [QuestionController::class, 'index'])->name('questions.admin');
        Route::get('/create', [QuestionController::class, 'create'])->name('questions.create');
        Route::post('/store', [QuestionController::class, 'store'])->name('questions.store');
        Route::get('/{id}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
        Route::put('/{id}', [QuestionController::class, 'update'])->name('questions.update');
        Route::delete('delete/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');

    });
});
