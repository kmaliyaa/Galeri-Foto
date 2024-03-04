<?php

use App\Models\Foto;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ExploreController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/register', [AuthController::class, 'register']);
Route::post('/registered', [AuthController::class, 'registered']);

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::middleware('auth')->group(function(){

    Route::get('/dasboard', function () {
        return view('page.dasboard');
    });

    Route::get('/detail/{id}', function () {
        return view('page.detail');
    });
    Route::get('/detail/{id}/getdatadetail', [ExploreController::class, 'getdatadetail']);
    Route::get('/getDataExplore', [ExploreController::class, 'getdata']);
    Route::post('/like', [ExploreController::class, 'like']);
    Route::get('/detail/getComment/{id}', [ExploreController::class, 'ambildatakomentar']);
    Route::post('detail/kirimkomentar', [ExploreController::class,  'kirimkomentar']);

    Route::get('/uploadfoto', function () {
        $data = auth()->user();
        $tampilalbum = Album::where('user_id', Auth::user()->id)->get();
        return view('page.uploadfoto', compact('tampilalbum', 'data'));
    });

    //ubah password
    Route::post('/ubahpassword', [UserController::class, 'ubahpassword']);

    Route::get('/album', function () {
        $data = auth()->user();
        $tampilalbum = Album::with('user')->where('user_id', auth()->user()->id)->get();
        return view('page.album', compact('data', 'tampilalbum'));
    });
    Route::get('/isialbum/{id}', [ProfilController::class, 'isialbum']);

    Route::get('/ubahpassword', function(){
        return view('page.ubahpassword');
    });

    Route::get('/editfoto', function () {
        return view('page.editfoto');
    });
    
    Route::post('/savefoto',[FotoController::class, 'savefoto']);
    Route::get('/editfoto/{id}', [FotoController::class, 'editdeskripsi']);
    Route::get('/detail/{id}', [FotoController::class, 'tampildata']);
    Route::post('/updatedeskripsi/{id}', [FotoController::class, 'updatedeskripsi']);
    Route::get('/hapusfoto/{id}', [FotoController::class, 'hapus']);
    
    //Route profilsya
    Route::get('/postingan', function () {
        $data = auth()->user();
        $posts = Foto::where('user_id', auth()->user()->id)->get();
        return view('page.postingan', compact('data', 'posts'));
    });

    //Route Edit Profil
    Route::get('/editprofil', function () {
        $data = auth()->user();
        return view('page.editprofil', compact('data'));
    });

    Route::post('/updateprofil', [AuthController::class, 'updateprofil']);
    
    Route::get('/getdataprofile/', [ProfilController::class, 'getdata']);
    Route::get('/Dataprofile', [ProfilController::class, 'getdataprofil']);
    Route::post('/tambah_album', [ProfilController::class, 'tambah_album']);
    Route::get('/albumuser', [ProfilController::class, 'albumuser']);
    // Route::get('/upload')
        // $data = auth()->user();
        // $tampilalbum = Album::with('foto')->where('user_id', auth()->user()->id)->get();
        // return view('page.album', compact('tampilalbum'));
    // ]);

    //Route Profil user lain
    Route::get('/profile/{id}', function(){
        return view('page.profilorang');
    });

    // Route::post('updateprofil/{id}', [AuthController::class, 'updateprofil']);
    Route::get('/logout', [AuthController::class, 'logout']);
});
 
Route::post('/auth', [AuthController::class, 'auth']);
