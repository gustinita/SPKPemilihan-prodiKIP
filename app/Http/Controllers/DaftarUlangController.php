<?php

namespace App\Http\Controllers;

use App\Models\data;
use App\Models\datacrips;
use App\Models\DataProdi;
use App\Models\Kriteria;
use App\Models\Saw;
use Illuminate\Http\Request;
use DB;
use PDF;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class DaftarUlangController extends Controller
{
  public function edit()
  {
    /*$cost_range = [
      // 0-1jt
      [
        "nilaimtk" => "0-1000000",
        "nilai" => 1,
      ],
      [
        // 1-5jt
        "nilaimtk" => "1000000-5000000",
        "nilai" => 2,
      ],
      [
        // 5-10jt
        "nilaimtk" => "5000000-10000000",
        "nilai" => 3,
      ],
      [
        // 10-25jt
        "nilaimtk" => "10000000-25000000",
        "nilai" => 4,
      ],
      [
        // 25-100jt
        "nilaimtk" => "25000000-100000000",
        "nilai" => 5,
      ],
    ];*/

    $kriteria = Kriteria::leftjoin('data', 'data.kode', '=', 'kriteria.hasil1')->leftjoin('users', 'users.id', '=', 'kriteria.mhs_id')->leftjoin('data_kip', 'data_kip.user_id', '=', 'users.id')->select('kriteria.*', 'data_kip.kode_registrasi', 'data_kip.nama','data.alternatif as prodi')->where('mhs_id', Auth::user()->id)->first();

 if(!$kriteria) {
      return back();
    }

/*
    $status = $kriteria->status;
    $status_berkas = $kriteria->status_berkas;
    if($kriteria->status != 'DISETUJUI') {
        return back();
    }*/

   

    return view('daftarulang.index', compact(['kriteria']));
  }

  public function index() {
  $kriterias = Kriteria::leftjoin('data', 'data.kode', '=', 'kriteria.hasil1')->leftjoin('users', 'users.id', '=', 'kriteria.mhs_id')->leftjoin('data_kip', 'data_kip.user_id', '=', 'users.id')->select('kriteria.*', 'data_kip.kode_registrasi', 'data_kip.nama','data.alternatif as prodi')->where('status', 'DISETUJUI')->get();
/*

    $kriterias = Kriteria::leftjoin('users', 'users.id', '=', 'kriteria.mhs_id')->leftjoin('data_kip', 'data_kip.user_id', '=', 'users.id')->select('kriteria.*', 'data_kip.kode_registrasi', 'data_kip.nama')->where('status', 'DISETUJUI')->get();
*/

    return view('daftarulang.indexadmin', compact(['kriterias']));
  }


    public function setuju($id)
    {
        $validasi = Kriteria::find($id);
        $validasi->status_berkas = 'SUDAH DIVERIFIKASI';
        $validasi->save();
        return redirect('/daftarulang/admin');
    }

    public function tolak($id)
    {
        $validasi = Kriteria::find($id);
       
        $validasi->status_berkas = 'BERKAS SALAH';
        $validasi->berkas = null;
        $validasi->berkas_akta = null;
        $validasi->berkas_kk = null;
        $validasi->berkas_ijazah = null;
        $validasi->save();
        return redirect('/daftarulang/admin');
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

  public function cetak()
  {
     /*$kriteria = Kriteria::leftjoin('users', 'users.id', '=', 'kriteria.mhs_id')->leftjoin('data_kip', 'data_kip.user_id', '=', 'users.id')->select('kriteria.*', 'data_kip.kode_registrasi', 'data_kip.nama')->where('mhs_id', Auth::user()->id)->first();
     */
 $kriteria = Kriteria::leftjoin('data', 'data.kode', '=', 'kriteria.hasil1')->leftjoin('users', 'users.id', '=', 'kriteria.mhs_id')->leftjoin('data_kip', 'data_kip.user_id', '=', 'users.id')->select('kriteria.*', 'data_kip.kode_registrasi', 'data_kip.nama','data.alternatif as prodi')->where('mhs_id', Auth::user()->id)->first();
 if(!$kriteria) {
      return back();
    }
/*

    $status = $kriteria->status;
    $status_berkas = $kriteria->status_berkas;
    if($kriteria->status != 'DISETUJUI') {
        return back();
    }


    $kriterias = Kriteria::where('mhs_id', Auth::user()->id)->get();
    $datacrips = datacrips::where('tipe', '1')->get();
    $data = [];
    $preferensi = [];
    foreach ($kriterias as $k) {
      $preferensi[0] = $this->calculatePreferensi($k, $datacrips, $k->kode1);
    }
    

    usort($preferensi, function ($a, $b) {
      if ($a["value"] == $b["value"]) {
        return 0;
      }
      return ($a["value"] < $b["value"]) ? 1 : -1;
    });
*/

    return view('daftarulang.cetak', compact(['kriteria']));
  }

  public function store(Request $request)
  {
  }


  public function update(Request $request, $id)
  {
    if($request->berkas) {            

         $fileName = date('YmdHis').'-berkas-'.rand(11111, 99999). '.' .$request->berkas->extension(); 
         $request->berkas->move('berkas', $fileName);

        } else {
            $fileName = null;
        }

    if($request->berkas_akta) {   
         $fileName_akta = date('YmdHis').'-berkas_akta-'.rand(11111, 99999). '.' .$request->berkas_akta->extension(); 
         $request->berkas_akta->move('berkas', $fileName_akta);

        } else {
            $fileName_akta = null;
        }
    if($request->berkas_kk) {   
         $fileName_kk = date('YmdHis').'-berkas_kk-'.rand(11111, 99999). '.' .$request->berkas_kk->extension(); 
         $request->berkas_kk->move('berkas', $fileName_kk);

        } else {
            $fileName_kk = null;
        }

    if($request->berkas_ijazah) {   
         $fileName_ijazah = date('YmdHis').'-berkas_ijazah-'.rand(11111, 99999). '.' .$request->berkas_ijazah->extension(); 
         $request->berkas_ijazah->move('berkas', $fileName_ijazah);

        } else {
            $fileName_ijazah = null;
        }

        $data = Kriteria::find($id);
        $data->status_berkas = 'MENUNGGU';
        $data->berkas = $fileName;
        $data->berkas_akta = $fileName_akta;
        $data->berkas_kk = $fileName_kk;
        $data->berkas_ijazah = $fileName_ijazah;
        $data->save();   

    return back()->with(['message' => 'Data Berhasil diupdate']);
  }
}
