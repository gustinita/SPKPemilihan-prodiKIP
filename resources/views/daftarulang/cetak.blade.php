<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>LAPORAN</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Untuk load bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->

 <style>
body {
  background-color: #999;
   -webkit-print-color-adjust:exact !important;
  print-color-adjust:exact !important;
}
    @page { size: A4 }
* {
  font-family: "Arial";
}
.text-center {
  text-align: center;
}
h1 {
  text-align: center;
  font-size: 20px;
}
h3 {
  font-size: 14px;
  font-weight: bold;
}
h4 {
  margin-top: 20px;
  text-transform: uppercase;
  margin-bottom: -10px;
}
td {
  padding: 5px !important;
  text-align: center;
  vertical-align: middle !important;
 /* border-color: #fff !important;
  padding: 5px !important;*/
  /*text-transform: capitalize;*/
}
.page {
  page-break-after: always;
}


@media print {
  
   body {margin: 0;}
}
</style>
</head>
<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "" if you need -->
<body class="A4 " onload="window.print();">
 <?php
 //menampung input date start dan end dari index tadi
         
  ?>
  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm" style="height: auto !important;">
<table>


    <h1>LAPORAN HASIL PENENTUAN PROGRAM STUDI </h1>
    <h1> CALON 
MAHASISWA KIP</h1>
<br>
<h3>1.  Data Pengajuan</h3>
<table class="tabled">
    <tr>
      <td style="text-align: left !important;">Nama</td>
      <td style="width:50px;">:</td>
      <td style="text-align: left !important;">{{$kriteria->nama}}</td>
    </tr>
    <tr>
      <td style="text-align: left !important;">Kode Registrasi</td>
      <td style="width:50px;">:</td>
      <td style="text-align: left !important;">{{$kriteria->kode_registrasi}}</td>
    </tr>
</table>
     <table id="example2" class="table table-bordered table-hover">
   
                         <tbody class="">
                        <tr style="white-space: nowrap !important;">
                        
                          <th>Pilihan Program Studi</th>
                          <th>Nilai</th>
                          <th>Waktu Pengajuan</th>
                          <th>Jalur</th>
                        </tr>
                        <tr>
                          @php
                            $k1 = App\Models\DataProdi::where('kode', $kriteria->kode1)->first()->alternatif;
                            $k2 = App\Models\DataProdi::where('kode', $kriteria->kode2)->first()->alternatif;
                            $k3 = App\Models\DataProdi::where('kode', $kriteria->kode3)->first()->alternatif;
                          @endphp
                          <td style="text-align: left !important;">{{$k1}}</td>
                        <td>
                          @if($kriteria->kode1 == $kriteria->hasil1)
                          {{$kriteria->nilai1}}
                          @endif
                          @if($kriteria->kode1 == $kriteria->hasil2)
                          {{$kriteria->nilai2}}
                          @endif
                          @if($kriteria->kode1 == $kriteria->hasil3)
                          {{$kriteria->nilai3}}
                          @endif

                        </td>
                          <td rowspan="3">{{$kriteria->created_at}}</td>
                          <td rowspan="3">KIP</td>
                        </tr>
                        <tr>
                        <td style="text-align: left !important;">  {{$k2}}</td>
                        <td>
                          @if($kriteria->kode2 == $kriteria->hasil1)
                          {{$kriteria->nilai1}}
                          @endif
                          @if($kriteria->kode2 == $kriteria->hasil2)
                          {{$kriteria->nilai2}}
                          @endif
                          @if($kriteria->kode2 == $kriteria->hasil3)
                          {{$kriteria->nilai3}}
                          @endif</td>
                        </tr>
                        <tr>
                        <td style="text-align: left !important;">  {{$k3}}</td>
                        <td>
                          @if($kriteria->kode3 == $kriteria->hasil1)
                          {{$kriteria->nilai1}}
                          @endif
                          @if($kriteria->kode3 == $kriteria->hasil2)
                          {{$kriteria->nilai2}}
                          @endif
                          @if($kriteria->kode3 == $kriteria->hasil3)
                          {{$kriteria->nilai3}}
                          @endif</td>
                        </tr>
                       </tbody>

                    </table>

<h3>2.  Data Hasil Penentuan Program Studi </h3>
  <table id="example2" class="table table-bordered table-hover">
   
                         <tbody class="">
                        <tr style="white-space: nowrap !important;">
                        
                          <th>Hasil Prodi Rekomendasi</th>
                          <th>Disetujui / Ditolak </th>
                          <th>Waktu Verifikasi
</th>
                        </tr>
                        <tr>
                          <td style="text-align: left !important;">{{$kriteria->prodi}}</td>
                          <td >{{$kriteria->status}}</td>
                          <td >{{$kriteria->waktu_verifikasi}}</td>
                        </tr>
                        <tr>
                          <td colspan="3" style="text-align: left !important;">Direkomendasikan karena {{$kriteria->prodi}} nilai tertinggi dibanding 2 pilihan prodi lainnya.</td>
                        </tr>
                       </tbody>

                    </table>
                    <p>*Lampirkan laporan ini saat daftar ulang.</p>
  </section>
</body>
</html>
