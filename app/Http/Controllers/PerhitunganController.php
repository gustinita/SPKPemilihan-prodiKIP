<?php

namespace App\Http\Controllers;

use App\Models\datacrips;
use App\Models\DataProdi;
use Illuminate\Http\Request;

use App\Models\Kriteria;
use App\Models\Saw;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;

class PerhitunganController extends Controller
{
    public function index(Request $request)
    {
        $saws = Saw::all();
       $mhs_id = $request->mhs_id;
/* 
        $cost_range = [
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
        ];

        $kriterias = Kriteria::where('mhs_id', $request->mhs_id)->get();
        $datacrips = datacrips::where('tipe', '1')->get();
        $data = [];
        $preferensi = [];
        foreach ($kriterias as $kriteria) {
            $preferensi[0] = $this->calculate_preferensi($kriteria, $datacrips, $kriteria->kode1);
        }

        usort($preferensi, function ($a, $b) {
            if ($a["value"] == $b["value"]) {
                return 0;
            }
            return ($a["value"] < $b["value"]) ? 1 : -1;
        });*/


    $kriteria = Kriteria::leftjoin('data', 'data.kode', '=', 'kriteria.hasil1')->where('mhs_id', $request->mhs_id)->select('kriteria.*','data.alternatif as prodi')->first();

        $users = User::where('level', 'user')->get();

        return view('perhitungan.index', compact('saws', 'kriteria', 'users', 'mhs_id'));
    }


    function calculate_preferensi($kriteria, $datacrips, $kode)
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
}
