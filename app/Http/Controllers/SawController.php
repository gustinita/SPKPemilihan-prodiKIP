<?php

namespace App\Http\Controllers;

use App\Models\data;
use App\Models\datacrips;
use App\Models\DataProdi;
use App\Models\Kriteria;
use App\Models\Saw;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class SawController extends Controller
{
  public function index()
  {
    /*$cost_range = [
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
    $kriteria = Kriteria::where('mhs_id', Auth::user()->id)->first();
    $datacrips = datacrips::where('tipe', '1')->get();
    $data = [];
    $preferensi = [];
    $status = $kriteria->status;
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
    });*/


    $kriteria = Kriteria::leftjoin('data', 'data.kode', '=', 'kriteria.hasil1')->where('mhs_id', Auth::user()->id)->select('kriteria.*','data.alternatif as prodi')->first();
    if(!$kriteria) {
      return back();
    }
    return view('saw.index', compact(['kriteria']));
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

  public function create()
  {
  }

  public function store(Request $request)
  {
  }

  public function edit($id)
  {
  }

  public function update(Request $request, $id)
  {
    Saw::where('id', $id)->update([
      'b_c1' => $request->b_c1,
      'b_c2' => $request->b_c2,
      'b_c3' => $request->b_c3,
      'b_c4' => $request->b_c4,
      'b_c5' => $request->b_c5,
    ]);

    return back()->with(['message' => 'Data Berhasil diupdate']);
  }
}
