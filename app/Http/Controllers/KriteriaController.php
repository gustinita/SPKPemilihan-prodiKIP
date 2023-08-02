<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\datacrips;
use App\Models\Slotkuotakip;
use App\Models\DataProdi;
use App\Models\Saw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::where('mhs_id', Auth::id())->get();
        $rowCount = DB::table('kriteria')->where('mhs_id', Auth::id())->count();
        return view('datakriteria.index', compact(['kriteria', 'rowCount']));
    }

    public function create()
    {
        return view('datakriteria.create');
    }

    public function store(Request $request)
    {
        //dd($request->except(['_token','submit']));
        $k = Kriteria::where('mhs_id', Auth::id())->get();

        if (count($k) >= 3) {
            return back()->with(['message' => 'Maksimal 3 Pilihan Jurusan']);
        } else {
            foreach ($k as $data) {
                if ($data->kode == $request->kode) {
                    return back()->with(['message' => 'Data Jurusan tersebut sudah ada sebelumnya.']);
                }
            }
        }
        $c5 = preg_replace('/[^0-9]/', '', $request->c5);
        $k = Kriteria::create([
            'kode1' => $request->kode1,
            'kode2' => $request->kode2,
            'kode3' => $request->kode3,
            'c1' => $request->c1,
            'c2' => $request->c2,
            'c3' => $request->c3,
            'c4' => $request->c4,
            'c5' => $c5,
            'mhs_id' => Auth::id(),
        ]);


         $cost_range = [
      [
        "nilaimtk" => "0-2000000",
        "nilai" => 1,
      ],
      [
        "nilaimtk" => "2100000-2500000",
        "nilai" => 2,
      ],
      [
        "nilaimtk" => "2600000-3000000",
        "nilai" => 3,
      ],
      [
        "nilaimtk" => "3100000-3500000",
        "nilai" => 4,
      ],
      [
        "nilaimtk" => "3600000-100000000",
        "nilai" => 5,
      ],
    ];

    $kriterias = Kriteria::where('mhs_id', Auth::user()->id)->get();
    $kriteriaz = Kriteria::where('mhs_id', Auth::user()->id)->first();
    $datacrips = datacrips::where('tipe', '1')->get();
    $data = [];
    $preferensi = [];
    $status = $kriteriaz->status;
    foreach ($kriterias as $kriteria) {
      $preferensi[0] = $this->calculatePreferensi($kriteria, $datacrips, $kriteria->kode1);
      $preferensi[1] = $this->calculatePreferensi($kriteria, $datacrips, $kriteria->kode2);
      $preferensi[2] = $this->calculatePreferensi($kriteria, $datacrips, $kriteria->kode3);
    }
    

    usort($preferensi, function ($a, $b) {
      if ($a["value"] == $b["value"]) {
        return 0;
      }
      return ($a["value"] < $b["value"]) ? 1 : -1;
    });

    foreach($preferensi as $pr) {
           if($kriteriaz->hasil1 == null) {
            $kode1 = $pr['kode'];
            $nilai1 = $pr['value'];
            $kriteriaz->update(['hasil1' => $kode1, 'nilai1' => $nilai1]);
            
            //a1 informatika
            //a2 arsitek
            //a3 pwk
            //a4 sipil

            $cek_kuota = Kriteria::query();
            $kuota = Slotkuotakip::first();
            $waktu = Carbon::now();
            if($kriteriaz->hasil1 == 'A1') {
                $cq = $cek_kuota->where(function($q) {
                    $q->where('status', '=', 'DISETUJUI');
                    $q->orwhere('status', '=', 'MENUNGGU');
                })->where('hasil1', 'A1')->where('mhs_id', '!=', Auth::user()->id)->count();
               
                if($cq >= $kuota->informatika) {
                    $kriteriaz->update(['status' => 'DITOLAK', 'ket_tolak' => 'KUOTA SUDAH PENUH.', 'waktu_verifikasi' => $waktu]);
                }else {
                     $kriteriaz->update(['status' => 'DISETUJUI', 'ket_tolak' => '', 'waktu_verifikasi' => $waktu]);
                }
            }
            if($kriteriaz->hasil1 == 'A2') {
                $cq = $cek_kuota->where(function($q) {
                    $q->where('status', '=', 'DISETUJUI');
                    $q->orwhere('status', '=', 'MENUNGGU');
                })->where('hasil1', 'A2')->where('mhs_id', '!=', Auth::user()->id)->count();
               
                if($cq >= $kuota->arsitek) {
                    $kriteriaz->update(['status' => 'DITOLAK', 'ket_tolak' => 'KUOTA SUDAH PENUH.', 'waktu_verifikasi' => $waktu]);
                }else {
                      $kriteriaz->update(['status' => 'DISETUJUI', 'ket_tolak' => '', 'waktu_verifikasi' => $waktu]);
                }
            }
            if($kriteriaz->hasil1 == 'A3') {
                $cq = $cek_kuota->where(function($q) {
                    $q->where('status', '=', 'DISETUJUI');
                    $q->orwhere('status', '=', 'MENUNGGU');
                })->where('hasil1', 'A3')->where('mhs_id', '!=', Auth::user()->id)->count();
               
                if($cq >= $kuota->pwk) {
                    $kriteriaz->update(['status' => 'DITOLAK', 'ket_tolak' => 'KUOTA SUDAH PENUH.', 'waktu_verifikasi' => $waktu]);
                }else {
                      $kriteriaz->update(['status' => 'DISETUJUI', 'ket_tolak' => '', 'waktu_verifikasi' => $waktu]);
                }
            }
            if($kriteriaz->hasil1 == 'A4') {
                $cq = $cek_kuota->where(function($q) {
                    $q->where('status', '=', 'DISETUJUI');
                    $q->orwhere('status', '=', 'MENUNGGU');
                })->where('hasil1', 'A4')->where('mhs_id', '!=', Auth::user()->id)->count();
               
                if($cq >= $kuota->sipil) {
                    $kriteriaz->update(['status' => 'DITOLAK', 'ket_tolak' => 'KUOTA SUDAH PENUH.', 'waktu_verifikasi' => $waktu]);
                }else {
                      $kriteriaz->update(['status' => 'DISETUJUI', 'ket_tolak' => '', 'waktu_verifikasi' => $waktu]);
                }
            }
          

        } elseif($kriteriaz->hasil2 == null) {
            $kode2 = $pr['kode'];
            $nilai2 = $pr['value'];
            $kriteriaz->update(['hasil2' => $kode2, 'nilai2' => $nilai2]);
        }else if($kriteriaz->hasil3 == null) {
            $kode3 = $pr['kode'];
            $nilai3 = $pr['value'];
            $kriteriaz->update(['hasil3' => $kode3, 'nilai3' => $nilai3]);
        }
        
    }


        return redirect('/kriteria')->with(['message' => 'Data Berhasil disimpan']);
    }

    function calculatePreferensi($kriteria, $datacrips, $kode)
  {
    $saw = Saw::where('kode', $kode)->first();

    $preferensi = [
      'c1' => $saw->b_c1 / $this->get_range_value($datacrips, $kriteria->c1),
      'c2' => $saw->b_c2 / $this->get_range_value($datacrips, $kriteria->c2),
      'c3' => $saw->b_c3 / $this->get_range_value($datacrips, $kriteria->c3),
      'c4' => $saw->b_c4 / $this->get_range_value($datacrips, $kriteria->c4),
      'c5' => $this->get_range_value($datacrips, $kriteria->c5) / $saw->b_c5
    ];

    return [
      'kode' => $kode,
      'prodi' => DataProdi::where('kode', $kode)->first()->alternatif,
      'value' => ($preferensi['c1'] * $saw->b_c1) + ($preferensi['c2'] * $saw->b_c2) + ($preferensi['c3'] * $saw->b_c3) + ($preferensi['c4'] * $saw->b_c4) + ($preferensi['c5'] * $saw->b_c5)
    ];
  }

  function get_range_value($data, $targetValue)
  {
    foreach ($data as $item) {
      $range = explode('-', $item['nilaimtk']);
      $start = intval($range[0]);
      $end = intval($range[1]);

      if ($targetValue >= $start && $targetValue <= $end) {
        return $item['nilai'];
      }
    }

    return null; // Jika nilai tidak berada di dalam range manapun
  }

    public function edit($id)
    {
        $kriteria = Kriteria::find($id);
        $penghasilan = currency($kriteria->c5);
        return view('datakriteria.edit', compact(['kriteria', 'penghasilan']));
    }
    public function rekap()
    {
        $validasi = Kriteria::leftjoin('data', 'data.kode', '=', 'kriteria.hasil1')->leftjoin('users', 'users.id', '=', 'kriteria.mhs_id')->leftjoin('data_kip', 'data_kip.user_id', '=', 'users.id')->select('kriteria.*', 'data_kip.kode_registrasi', 'data_kip.nama','data.alternatif as prodi')->get();
        
        $kriterias = Kriteria::leftjoin('data', 'data.kode', '=', 'kriteria.hasil1')->leftjoin('users', 'users.id', '=', 'kriteria.mhs_id')->leftjoin('data_kip', 'data_kip.user_id', '=', 'users.id')->select('kriteria.*', 'data_kip.kode_registrasi', 'data_kip.nama','data.alternatif as prodi')->where('status', 'DISETUJUI')->get();
        return view('daftarulang.rekap', compact(['validasi', 'kriterias']));
    }

    public function update(Request $request, $id)
    {
        $c5 = preg_replace('/[^0-9]/', '', $request->c5);
        $kriteria = Kriteria::where('id', $id)->update([
            'c1' => $request->c1,
            'c2' => $request->c2,
            'c3' => $request->c3,
            'c4' => $request->c4,
            'c5' => $c5,
            'hasil1' => null,
            'hasil2' => null,
            'hasil3' => null,
            'nilai1' => null,
            'nilai2' => null,
            'nilai3' => null,
            'kode1' => $request->kode1,
            'kode2' => $request->kode2,
            'kode3' => $request->kode3
        ]);



        $cost_range = [
      [
        "nilaimtk" => "0-2000000",
        "nilai" => 1,
      ],
      [
        "nilaimtk" => "2100000-2500000",
        "nilai" => 2,
      ],
      [
        "nilaimtk" => "2600000-3000000",
        "nilai" => 3,
      ],
      [
        "nilaimtk" => "3100000-3500000",
        "nilai" => 4,
      ],
      [
        "nilaimtk" => "3600000-100000000",
        "nilai" => 5,
      ],
    ];

    $kriterias = Kriteria::where('id', $id)->get();
    $kriteriaz = Kriteria::where('id', $id)->first();
    $datacrips = datacrips::where('tipe', '1')->get();
    $data = [];
    $preferensi = [];
    foreach ($kriterias as $kriteria) {
      $preferensi[0] = $this->calculatePreferensi($kriteria, $datacrips, $kriteria->kode1);
      $preferensi[1] = $this->calculatePreferensi($kriteria, $datacrips, $kriteria->kode2);
      $preferensi[2] = $this->calculatePreferensi($kriteria, $datacrips, $kriteria->kode3);
    }
    

    usort($preferensi, function ($a, $b) {
      if ($a["value"] == $b["value"]) {
        return 0;
      }
      return ($a["value"] < $b["value"]) ? 1 : -1;
    });

    foreach($preferensi as $pr) {
        if($kriteriaz->hasil1 == null) {
            $kode1 = $pr['kode'];
            $nilai1 = $pr['value'];
            $kriteriaz->update(['hasil1' => $kode1, 'nilai1' => $nilai1]);

             $cek_kuota = Kriteria::query();
            $kuota = Slotkuotakip::first();
            $waktu = Carbon::now();
            if($kriteriaz->hasil1 == 'A1') {
                $cq = $cek_kuota->where(function($q) {
                    $q->where('status', '=', 'DISETUJUI');
                    $q->orwhere('status', '=', 'MENUNGGU');
                })->where('hasil1', 'A1')->where('mhs_id', '!=', Auth::user()->id)->count();
               
                if($cq >= $kuota->informatika) {
                    $kriteriaz->update(['status' => 'DITOLAK', 'ket_tolak' => 'KUOTA SUDAH PENUH.', 'waktu_verifikasi' => $waktu]);
                }else {
                      $kriteriaz->update(['status' => 'DISETUJUI', 'ket_tolak' => '', 'waktu_verifikasi' => $waktu]);
                }
            }
            if($kriteriaz->hasil1 == 'A2') {
                $cq = $cek_kuota->where(function($q) {
                    $q->where('status', '=', 'DISETUJUI');
                    $q->orwhere('status', '=', 'MENUNGGU');
                })->where('hasil1', 'A2')->where('mhs_id', '!=', Auth::user()->id)->count();
               
                if($cq >= $kuota->arsitek) {
                    $kriteriaz->update(['status' => 'DITOLAK', 'ket_tolak' => 'KUOTA SUDAH PENUH.', 'waktu_verifikasi' => $waktu]);
                }else {
                      $kriteriaz->update(['status' => 'DISETUJUI', 'ket_tolak' => '', 'waktu_verifikasi' => $waktu]);
                }
            }
            if($kriteriaz->hasil1 == 'A3') {


                $cq = $cek_kuota->where(function($q) {
                    $q->where('status', '=', 'DISETUJUI');
                    $q->orwhere('status', '=', 'MENUNGGU');
                })->where('hasil1', 'A3')->where('mhs_id', '!=', Auth::user()->id)->count();
                 /* dd($cq . ' / '.$kuota->pwk);*/
                if($cq >= $kuota->pwk) {
                    $kriteriaz->update(['status' => 'DITOLAK', 'ket_tolak' => 'KUOTA SUDAH PENUH.', 'waktu_verifikasi' => $waktu]);
                } else {
                      $kriteriaz->update(['status' => 'DISETUJUI', 'ket_tolak' => '', 'waktu_verifikasi' => $waktu]);
                }
            }
            if($kriteriaz->hasil1 == 'A4') {
                $cq = $cek_kuota->where(function($q) {
                    $q->where('status', '=', 'DISETUJUI');
                    $q->orwhere('status', '=', 'MENUNGGU');
                })->where('hasil1', 'A4')->where('mhs_id', '!=', Auth::user()->id)->count();
               
                if($cq >= $kuota->sipil) {
                    $kriteriaz->update(['status' => 'DITOLAK', 'ket_tolak' => 'KUOTA SUDAH PENUH.', 'waktu_verifikasi' => $waktu]);
                }else {
                      $kriteriaz->update(['status' => 'DISETUJUI', 'ket_tolak' => '', 'waktu_verifikasi' => $waktu]);
                }
            }
        } elseif($kriteriaz->hasil2 == null) {
            $kode2 = $pr['kode'];
            $nilai2 = $pr['value'];
            $kriteriaz->update(['hasil2' => $kode2, 'nilai2' => $nilai2]);
        }else if($kriteriaz->hasil3 == null) {
            $kode3 = $pr['kode'];
            $nilai3 = $pr['value'];
            $kriteriaz->update(['hasil3' => $kode3, 'nilai3' => $nilai3]);
        }
        
    }
        return redirect('/kriteria')->with(['message' => 'Data Berhasil diupdate']);
    }

    public function destroy($id)
    {
        $kriteria = kriteria::find($id);
        $kriteria->delete();
        return redirect('/kriteria');
    }
}
