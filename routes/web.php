<?php


use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AllMovieController;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
  Route::namespace('Auth')->group(function(){
    //login function
    Route::get('login',[AuthenticatedSessionController::class,'create'])->name('login');
    Route::post('login',[AuthenticatedSessionController::class,'store'])->name('adminlogin');

  });
  Route::middleware('admin')->group(function(){
  Route::get('dashboard',[HomeController::class,'index'])->name('dashboard');
  //for movie
  Route::post('addmovie',[MovieController::class,'AddMovie'])->name('addmovie');
  Route::get('viewmovie',[MovieController::class,'ViewMovie'])->name('viewmovie');
  Route::get('movielist',[MovieController::class,'MovieList'])->name('movielist');
  Route::get('search_movie',[MovieController::class,'search_movie'])->name('search_movie');
  Route::put('getMovieDetail',[MovieController::class,'getMovieDetail'])->name('getMovieDetail');
  Route::delete('/deleteMovie',[MovieController::class,'deleteMovie'])->name('deleteMovie');
  
  Route::get('/show_user',[HomeController::class,'show_user'])->name('show_user');
  Route::get('/updatepass',[HomeController::class,'updatepass'])->name('updatepass');
  Route::post('update',[HomeController::class,'update'])->name('update');
  Route::get('keywordlist',[HomeController::class,'keywordlist'])->name('keywordlist');
  Route::post('addkeyword',[HomeController::class,'addkeyword'])->name('addkeyword');
  Route::get('Admin_show/{mid}',[HomeController::class,'Admin_show'])->name('Admin_show');
  Route::get('admin_search',[MovieController::class,'admin_search'])->name('admin_search');
 
  });
  //logout route

  Route::post('logout',[App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class,'destroy'])->name('logout');
});




//allmovies controller
Route::get('abc/{mid}',[MovieController::class,'abc'])->name('abc');

Route::get('allmovies',[AllMovieController::class,'AllMovies'])->name('allmovies');
Route::get('landing_movie',[AllMovieController::class,'landing_movie'])->name('landing_movie');
 Route::get('show/{mid}',[AllMovieController::class,'show'])->name('show');

 Route::post('write_comment',[AllMovieController::class,'write_comment'])->name('write_comment');

 Route::get('search',[MovieController::class,'search'])->name('search');
 Route::get('contact',[AllMovieController::class,'contact'])->name('contact');
 Route::get('about',[AllMovieController::class,'about'])->name('about');

 Route::post('/updateuser',[MovieController::class,'updateuser'])->name('updateuser');
 Route::get('updatepassword',[MovieController::class,'updatepassword'])->name('updatepassword');