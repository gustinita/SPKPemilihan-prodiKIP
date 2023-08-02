<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\datakip;
use App\Models\DataProdi;
use App\Models\Saw;
use App\Models\datacrips;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CalonmahasiswaController extends Controller
{
    public function index()
    {
        $validasi = Kriteria::leftjoin('data', 'data.kode', '=', 'kriteria.hasil1')->leftjoin('users', 'users.id', '=', 'kriteria.mhs_id')->leftjoin('data_kip', 'data_kip.user_id', '=', 'users.id')->select('kriteria.*', 'data_kip.kode_registrasi', 'data_kip.nama','data.alternatif as prodi')->get();



        return view ('calonmhs.index', compact('validasi'));
    }

    public function setuju($id)
    {
        $validasi = Kriteria::find($id);
        $validasi->status = 'DISETUJUI';
        $validasi->waktu_verifikasi = Carbon::now();
        $validasi->save();
        return redirect('/datapengajuan');
    }

    public function tolak($id)
    {
        $validasi = Kriteria::find($id);
       
        $validasi->status = 'DITOLAK';
        $validasi->waktu_verifikasi = Carbon::now();
        $validasi->save();
        return redirect('/datapengajuan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
