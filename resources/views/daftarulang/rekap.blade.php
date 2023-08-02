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
    @page { size: A4 landscape}
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
table {
  font-size: 13px;
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
<body class="A4 landscape" onload="window.print();">
 <?php
 //menampung input date start dan end dari index tadi
         
  ?>
  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm" style="height: auto !important;">
<table>


    <h1>LAPORAN REKAP DATA PENGAJUAN DAN </h1>
    <h1> DATA DAFTAR ULANG</h1>
<br>
<h3>1.  Data Pengajuan</h3>
<table class="table table-bordered">
                                <tr>
                                    <th>Kode Registrasi</th>
                                    <th>Nama</th>
                                    <th>Program Studi</th>
                                    <th>Status</th>
                                    
                                </tr>
                               @foreach ($validasi as $v)
                          
                                <tr>

                                    <td>{{$v->kode_registrasi}}</td>
                                    <td>{{$v->nama}}</td>
                                    <td>{{$v->prodi}}</td>
                                    <td>{{$v->status}}</td>
                       
                      </tr>
                      @endforeach
                                    
                            </table>
<br>
    
<h3>2.  Data Daftar Ulang </h3>
   <table class="table table-bordered">
                                    <tr>
                                        <th>Kode Registrasi</th>
                                        <th>Nama</th>
                                        <th>Upload Berkas</th>
                                        <th>Status Berkas</th>
                                    </tr>
                                    <tbody> 
                                        @foreach($kriterias as $kriteria)
                                            <tr>
                                                <td>{{ $kriteria->kode_registrasi }}</td>
                                                <td>{{ $kriteria->nama }}</td>
                                                <td>
                                                    @if($kriteria->berkas == '')
                                                        BELUM UPLOAD BERKAS
                                                    @else
                                                       Berkas Persetujuan : [Sudah Upload]<br>
                                                       Berkas Akta : [Sudah Upload]<br>
                                                       Berkas KK : [Sudah Upload]<br>
                                                       Berkas Ijazah : [Sudah Upload]<br>
                                                    @endif
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                            @php @endphp
                                    </tbody>
                                </table>
  </section>
</body>
</html>
