<?php

use App\Models\Kriteria;
use App\Models\datakip;
use App\Models\DataProdi;
use App\Models\Saw;
use App\Models\datacrips;
if (!function_exists('currency')){
    function currency($value){
        return "Rp. ". number_format($value,0,',','.');
    }
}


    function calculatePreferensi($kriteria, $datacrips, $kode, $kodereg, $nama, $status, $id)
  {
    $saw = Saw::where('kode', $kode)->first();

    $preferensi = [
      'c1' => $saw->b_c1 / get_range_value($datacrips, $kriteria->c1),
      'c2' => $saw->b_c2 / get_range_value($datacrips, $kriteria->c2),
      'c3' => $saw->b_c3 / get_range_value($datacrips, $kriteria->c3),
      'c4' => $saw->b_c4 / get_range_value($datacrips, $kriteria->c4),
      'c5' => get_range_value($datacrips, $kriteria->c5) / $saw->b_c5
    ];

    return [
      'kode' => $kode,
      'nama' => $nama,
      'kodereg' => $kodereg,
      'status' => $status,
      'id' => $id,
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

