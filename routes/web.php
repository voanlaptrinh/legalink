<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleServiceController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\IntroducesController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\DashboadController;
use App\Http\Controllers\Admin\EvaluationsController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\MenuServiceController;
use App\Http\Controllers\Admin\MindController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebConfigController;
use App\Http\Controllers\BankQrCodeController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\Users\ContactsControler;
use App\Http\Controllers\Users\HomeController;
use App\Http\Controllers\Users\IntroduceController;
use App\Http\Controllers\Users\LawController;
use App\Http\Controllers\Users\LoginController;
use App\Http\Controllers\Users\MembersControler;
use App\Http\Controllers\Users\MenuServiceController as UsersMenuServiceController;
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
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/question', [HomeController::class, 'faqs'])->name('faqs');
Route::get('/question/{id}', [HomeController::class, 'faqsdetail'])->name('faqs.detail');
Route::get('/tin-tuc', [UsersNewsController::class, 'index'])->name('news');
Route::get('/thu-vien-anh', [HomeController::class, 'thuvien'])->name('thuvien');
Route::get('/{alias}/chi-tiet', [UsersNewsController::class, 'detail'])->name('news.chi');

Route::get('gioi-thieu', [IntroduceController::class, 'index'])->name('introduce');
Route::get('nhan-su', [MembersControler::class, 'index'])->name('members');
Route::get('chi-tiet-nhan-su/{alias}', [MembersControler::class, 'details'])->name('members.detailuser');
Route::get('lien-he', [ContactsControler::class, 'index'])->name('contacts');
Route::get('van-ban-phap-luat', [LawController::class, 'index'])->name('law.index');

Route::post('/download-file/{id}', [LawController::class, 'download'])->name('file.download');

Route::get('/file/preview/{id}', [LawController::class, 'preview'])->name('file.preview');

Route::get('/generate-bank-qr-code', action: [BankQrCodeController::class, 'generateQrCode']);
Route::post('lienhe/store', [ContactsControler::class, 'store'])->name('contacts.store');


Route::get('/menu/{alias}', [UsersMenuServiceController::class, 'showMenu'])->name('menu.show');

// Route hiển thị chi tiết bài viết
Route::get('/articles/{alias}', [UsersMenuServiceController::class, 'showArticle'])->name('articles.show');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('postlogin');
Route::post('/register', [LoginController::class, 'register'])->name('postregister');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');




Route::prefix('/admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/',  [DashboadController::class, 'dashboard'])->name('admin.dashboard');
    Route::prefix('/files')->group(function () {
        Route::get('/', [FileController::class, 'index'])->name('files.index');
        Route::get('/create', [FileController::class, 'create'])->name('files.create');
        Route::post('/store', [FileController::class, 'store'])->name('files.store');
        Route::get('/files/{id}/edit', [FileController::class, 'edit'])->name('files.edit');
        Route::get('/files/{id}/detail', [FileController::class, 'detail'])->name('files.deatail');
        Route::put('/files/{id}', [FileController::class, 'update'])->name('files.update');
        Route::delete('/files/{id}', [FileController::class, 'destroy'])->name('files.destroy');
    });
    Route::prefix('/mind')->group(function () {
        Route::get('/', [MindController::class, 'index'])->name('minds.index');
        Route::get('/create', [MindController::class, 'create'])->name('minds.create');
        Route::post('/store', [MindController::class, 'store'])->name('minds.store');
        Route::get('/{id}/edit', [MindController::class, 'edit'])->name('minds.edit');
        Route::put('/{id}', [MindController::class, 'update'])->name('minds.update');
        Route::delete('delete/{id}', [MindController::class, 'destroy'])->name('minds.destroy');
    });
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
    Route::prefix('/pay_description')->group(function () {
        Route::get('/', [WebConfigController::class, 'pay'])->name('pay.index');
        Route::post('/update-pay', [WebConfigController::class, 'payupdate'])->name('pay.update');
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
    Route::prefix(('/Danh-gia-khach-hang'))->group(function () {
        Route::get('/', [EvaluationsController::class, 'index'])->name('evaluations.index');
        Route::get('/create', [EvaluationsController::class, 'create'])->name('evaluations.create');
        Route::post('/store', [EvaluationsController::class, 'store'])->name('evaluations.store');
        Route::get('/{id}/edit', [EvaluationsController::class, 'edit'])->name('evaluations.edit');
        Route::put('/{id}', [EvaluationsController::class, 'update'])->name('evaluations.update');
        Route::delete('delete/{id}', [EvaluationsController::class, 'destroy'])->name('evaluations.destroy');
    });
    Route::prefix(('/menu-dich-vu'))->group(function () {
        Route::get('/', [MenuServiceController::class, 'index'])->name('menuservice.index');
        Route::get('/create', [MenuServiceController::class, 'create'])->name('menuservice.create');
        Route::post('/store', [MenuServiceController::class, 'store'])->name('menuservice.store');
        Route::get('/{alias}/edit', [MenuServiceController::class, 'edit'])->name('menuservice.edit');
        Route::put('/{id}', [MenuServiceController::class, 'update'])->name('menuservice.update');
        Route::delete('delete/{id}', [MenuServiceController::class, 'destroy'])->name('menuservice.destroy');
    });
    Route::prefix(('/bai-viet-dich-vu'))->group(function () {
        Route::get('/', [ArticleServiceController::class, 'index'])->name('article.index');
        Route::get('/create', [ArticleServiceController::class, 'create'])->name('article.create');
        Route::post('/store', [ArticleServiceController::class, 'store'])->name('article.store');
        Route::get('/{id}/edit', [ArticleServiceController::class, 'edit'])->name('article.edit');
        Route::put('/{id}', [ArticleServiceController::class, 'update'])->name('article.update');
        Route::delete('delete/{id}', [ArticleServiceController::class, 'destroy'])->name('article.destroy');
        Route::get('/{id}/detail', [ArticleServiceController::class, 'detail'])->name('article.detail');
    });
    Route::prefix(('/tai-khoan-nguoi-dung'))->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

    });
    Route::prefix(('/tai-khoan-quan-ly'))->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('adminaccount.index');
        Route::get('/create', [AdminController::class, 'create'])->name('adminaccount.create');
        Route::post('/store', [AdminController::class, 'store'])->name('adminaccount.store');
        Route::put('/adminaccount/{id}', [AdminController::class, 'update'])->name('adminaccount.update');


    });
});
