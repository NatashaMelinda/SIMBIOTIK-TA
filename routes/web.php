<?php

use App\Http\Controllers\AccountSettingController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NativController;
use App\Http\Controllers\PhairController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\SuhuairController;
use App\Http\Controllers\TDSController;
use App\Http\Controllers\TinggiairController;
use App\Http\Controllers\UserController;
use App\Models\suhuair;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
 

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
    return view('login');
});

// Route::get('login', [LoginController::class,'login']);
Route::get('/login', function () {
    return view('login');
})->name('login');
    
Route::post('/postlogin', [LoginController::class, 'postlogin']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => ['auth','ceklevel:admin,user']], function () {
    //versi1
    //admin
    Route::get('profile', [BerandaController::class,'profile']);
    Route::get('dashboard', [BerandaController::class,'dashboard']);

    //grafik
    // Route::get('/suhuair-data', [SensorDataController::class, 'getData']);

    //Versi2
    Route::get('index', [BerandaController::class,'index']);
    Route::get('profile', [BerandaController::class,'profile']);
    // Route::get('/profile/{id}', [BerandaController::class, 'profile'])->name('profile');
    Route::get('/dashboard2', [BerandaController::class,'dashboard2']);
    Route::get('/dashboard2', [BerandaController::class, 'dashboard2'])->name('dashboard2');
    Route::get('control2', [BerandaController::class,'control2']);
    Route::get('accsetting', [BerandaController::class,'accsetting']);

    //suhuair
    Route::get('nilaisuhuair', [SuhuairController::class,'tampilsuhu']);
    Route::get('insert', [SuhuairController::class,'insertsuhu']);
    Route::get('/suhuairs/create', [SuhuairController::class,'create'])->name('suhuairs.create');
    Route::get('/suhuairs', [SuhuairController::class,'store'])->name('suhuairs.store');
    Route::get('nilaisuhuair/export/excel', [SuhuairController::class,'export']);

    //pHair
    Route::get('nilaipHair', [PhairController::class,'tampilpH']);
    Route::get('insertpH', [PhairController::class,'insertpH']);
    // Route::get('/suhuairs/create', [PhairController::class,'create'])->name('suhuairs.create');
    // Route::get('/suhuairs', [PhairController::class,'store'])->name('suhuairs.store');
    Route::get('nilaipHair/exportpH/excel',[PhairController::class,'exportpH']);
    // Route::get('nilaiphair/exportpH/excel', 'PhairController@export');

    //Tinggiair
    Route::get('nilaitinggiair', [TinggiairController::class,'tampiltinggi']);
    Route::get('inserttinggi', [TinggiairController::class,'inserttinggi']);
    Route::get('nilaitinggiair/exporttinggi/excel', [TinggiairController::class,'exporttinggi']);

});



//Hubungkan ke hardware
Route::get('/insertdatajarak', function (Request $request) {
    $jarak = $request->query('jarak');
    return response()->json(['message' => 'Data jarak berhasil disimpan']);
});


//TDS
Route::get('nilaiTDS', [TDSController::class,'tampiltds']);


//TabelSensor
Route::get('tabelsensor', [SensorController::class,'tampilnilaisensor']);

//setting profil
Route::post('/save-settings', [AccountSettingController::class, 'saveSettings'])->name('save.settings');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
// Route::get('/users/create', [UserController::class, 'create'])->name('user.create');

//controlnative
// Route::get('/native/control', [NativController::class, 'nativecontrol']);

//controlnative
Route::get('publik/native/control', [NativController::class, 'nativecontrol']);

Route::group(['middleware' => ['auth','ceklevel:admin']], function () {
    Route::get('control', [BerandaController::class,'control']);
    //users
    Route::get('kelolauser', [BerandaController::class,'kelolauser']);
    Route::delete('/user/{id}', [BerandaController::class, 'destroy'])->name('destroy');
    Route::get('/kelolauser', [BerandaController::class, 'kelolauser'])->name('user.kelolauser');

    // Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('destroy');
});

Route::get('/kelolauser', [UserController::class, 'index'])->name('kelolauser');
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');