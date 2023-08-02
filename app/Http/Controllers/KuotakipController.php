<?php

namespace App\Http\Controllers;

use App\Models\Slotkuotakip;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KuotakipController extends Controller
{
    public function index()
    {
        $k = Slotkuotakip::first();
        $cek_kuota_informatika = Kriteria::where(function($q) {
                    $q->where('status', '=', 'DISETUJUI');
                    $q->orwhere('status', '=', 'MENUNGGU');
                })->where('hasil1', 'A1')->get()->count();
        $cek_kuota_arsitek = Kriteria::where(function($q) {
                    $q->where('status', '=', 'DISETUJUI');
                    $q->orwhere('status', '=', 'MENUNGGU');
                })->where('hasil1', 'A2')->count();
        $cek_kuota_pwk = Kriteria::where(function($q) {
                    $q->where('status', '=', 'DISETUJUI');
                    $q->orwhere('status', '=', 'MENUNGGU');
                })->where('hasil1', 'A3')->count();
        $cek_kuota_sipil = Kriteria::where(function($q) {
                    $q->where('status', '=', 'DISETUJUI');
                    $q->orwhere('status', '=', 'MENUNGGU');
                })->where('hasil1', 'A4')->count();
        return view('kip.index', compact(['k', 'cek_kuota_sipil', 'cek_kuota_pwk', 'cek_kuota_arsitek', 'cek_kuota_informatika']));
    }

    
    public function create()
    {
        return view('kip.create');
    }

    
    public function store(Request $request)
    {
        //dd($request->except(['_token','submit']));
        Slotkuotakip::create($request->except(['_token','submit']));
        return redirect('/kuotakip');
    }

    public function edit($id)
    {
        $kuotakip = Slotkuotakip::find($id);
        return view('kip.edit',compact(['kuotakip']));
    }

   
    public function update(Request $request, $id)
    {
        $kuotakip = Slotkuotakip::find($id);
        $kuotakip->update($request->except(['_token','submit']));
        return redirect('/kuotakip');
    }
}
