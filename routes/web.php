<?php

use App\Http\Controllers\BahanajarController;
use App\Http\Controllers\BimbinganController;
use App\Http\Controllers\BiodataclnmhsController;
use App\Http\Controllers\BiodatadsnController;
use App\Http\Controllers\CalonmahasiswaController;
use App\Http\Controllers\DatacalonmhsController;
use App\Http\Controllers\DatacripsController;
use App\Http\Controllers\DataseringController;
use App\Http\Controllers\HasilrekomendasiController;
use App\Http\Controllers\SawController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\DaftarUlangController;
use App\Http\Controllers\KuotakipController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrasiilmiahController;
use App\Http\Controllers\PembimbingdsnController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\PengabdianController;
use App\Http\Controllers\PengajaranController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PengujianmhsController;
use App\Http\Controllers\PenunjangController;
use App\Http\Controllers\ProfiladmnController;
use App\Http\Controllers\TugastmbhnController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\PilihanprodiController;
use App\Models\kriteria;
use Illuminate\Support\Facades\Route;

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



Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/login', function () {
    return view('pengguna.login');
})->name('login');

Route::post("/postlogin", [LoginController::class, 'postlogin'])->name('postlogin');
Route::get("/logout", [LoginController::class, 'logout'])->name('logout');
Route::get("/registrasi", [LoginController::class, 'registrasi'])->name('registrasi');
Route::post("/simpanregistrasi", [LoginController::class, 'simpanregistrasi'])->name('simpanregistrasi');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    Route::get("/datacalonmhs", [DatacalonmhsController::class, 'index']);
    Route::get("/datacalonmhs/create", [DatacalonmhsController::class, 'create']);
    Route::post("/datacalonmhs/store", [DatacalonmhsController::class, 'store']);
    Route::get("/datacalonmhs/{id}/edit", [DatacalonmhsController::class, 'edit']);
    Route::put("/datacalonmhs/{id}", [DatacalonmhsController::class, 'update']);
    Route::delete("/datacalonmhs/{id}", [DatacalonmhsController::class, 'destroy']);

    Route::get("/kuotakip", [KuotakipController::class, 'index']);
    Route::get("/kuotakip/create", [KuotakipController::class, 'create']);
    Route::post("/kuotakip/store", [KuotakipController::class, 'store']);
    Route::get("/kuotakip/{id}/edit", [KuotakipController::class, 'edit']);
    Route::put("/kuotakip/{id}", [KuotakipController::class, 'update']);

    Route::get("/datapengajuan", [CalonmahasiswaController::class, 'index']);
    Route::get('/datapengajuan/{id}/setuju',[CalonmahasiswaController::class,'setuju']);
    Route::get('/datapengajuan/{id}/tolak',[CalonmahasiswaController::class,'tolak']);

    Route::get("/datacrips", [DatacripsController::class, 'index']);
    Route::get("/datacrips/create", [DatacripsController::class, 'create']);
    Route::post("/datacrips/store", [DatacripsController::class, 'store']);


    Route::get("/daftarulang/admin", [DaftarUlangController::class, 'index']);
    Route::get('/daftarulang/{id}/setuju',[DaftarUlangController::class,'setuju']);
    Route::get('/daftarulang/{id}/tolak',[DaftarUlangController::class,'tolak']);

    Route::get("/rekap-laporan", [KriteriaController::class, 'rekap']);

    Route::get("/Perhitungan/SAW", [PerhitunganController::class, 'index']);
});

Route::get("/saw", [SawController::class, 'index']);
Route::post("/saw/update/{id}", [SawController::class, 'update']);

Route::group(['middleware' => ['auth', 'ceklevel:user']], function () {




    Route::get("/biodatacalonmhs", [BiodataclnmhsController::class, 'index']);
    Route::get("/biodatacalonmhs/search", [BiodataclnmhsController::class, 'searchB']);
    Route::get("/biodatacalonmhs/save", [BiodataclnmhsController::class, 'save']);


    Route::get("/biodatacalonmhs/{id}/edit", [BiodataclnmhsController::class, 'edit']);
    Route::get("/biodatacalonmhs/create", [BiodataclnmhsController::class, 'create']);
    Route::post("/biodatacalonmhs/store", [BiodataclnmhsController::class, 'store']);
    Route::put("/biodatacalonmhs/{id}", [BiodataclnmhsController::class, 'update']);

    Route::get("/cetaklaporan", [DaftarUlangController::class, 'cetak']);
    Route::get("/daftarulang/", [DaftarUlangController::class, 'edit']);
    Route::put("/daftarulang/update/{id}", [DaftarUlangController::class, 'update']);

    Route::get("/biodataclnmhs", [BiodatadsnController::class, 'index']);
    Route::get("/biodataclnmhs/{id}/edit", [BiodatadsnController::class, 'edit']);
    Route::put("/biodataclnmhs/{id}", [BiodatadsnController::class, 'update']);

    Route::get("/kriteria", [KriteriaController::class, 'index']);
    Route::get("/kriteria/create", [KriteriaController::class, 'create']);
    Route::post("/kriteria/store", [KriteriaController::class, 'store']);
    Route::get("/kriteria/{id}/edit", [KriteriaController::class, 'edit']);
    Route::put("/kriteria/{id}", [KriteriaController::class, 'update']);
    Route::delete("/kriteria/{id}", [KriteriaController::class, 'destroy']);

    Route::get("/pilihanprodi", [PilihanprodiController::class, 'index']);
    Route::get("/pilihanprodi/create", [PilihanprodiController::class, 'create']);
    Route::post("/pilihanprodi/store", [PilihanprodiController::class, 'store']);
    Route::get("/pilihanprodi/{id}/edit", [PilihanprodiController::class, 'edit']);
    Route::put("/pilihanprodi/{id}", [PilihanprodiController::class, 'update']);
    Route::delete("/pilihanprodi/{id}", [PilihanprodiController::class, 'destroy']);

    Route::get("/hasilrekomendasi", [HasilrekomendasiController::class, 'index']);
    Route::get("/hasilrekomendasi/create", [HasilrekomendasiController::class, 'create']);
    Route::post("/hasilrekomendasi/store", [HasilrekomendasiController::class, 'store']);
    Route::get("/hasilrekomendasi/{id}/edit", [HasilrekomendasiController::class, 'edit']);
    Route::put("/hasilrekomendasi/{id}", [HasilrekomendasiController::class, 'update']);
    Route::delete("/hasilrekomendasi/{id}", [HasilrekomendasiController::class, 'destroy']);
});
