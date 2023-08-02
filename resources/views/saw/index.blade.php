@extends('layout.mastercode')
@section('content')
    <style type="text/css">
        td,
        th {
            vertical-align: middle !important;
            text-align: center !important;
        }

        tr {
            white-space: nowrap !important;
        }
    </style>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card border-left-info">
                        <div class="card-header">
                            <h3 class="m-0 font-weight-bold text-info">Hasil Penentuan Rekomendasi Program Studi
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered">
                                    <h3 class="card-title">Penentuan Prodi : <span
                                            class="btn btn-danger btn-xs">{{ Auth::user()->name }}</span></h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Kode</th>
                                        <th>Program Studi</th>
                                        <th>Status</th>
                                    </tr>
                                    <tbody>
                                        
                                            <tr>
                                                <td>{{ $kriteria->hasil1 }}</td>
                                                <td>{{ $kriteria->prodi }}</td>
                                                <td>{{ $kriteria->status }}</td>
                                            </tr>
                                    </tbody>
                                </table>

                                <div class="alert {{($kriteria->status == 'DISETUJUI' ? 'alert-success' : 'alert-danger')}}" style="display: {{$kriteria->status != 'MENUNGGU' ? 'inline-block' : 'none'}};">
                                    @if($kriteria->status == 'DISETUJUI')
                                     selamat {{ Auth::user()->name }} anda berhasil masuk pada program studi {{ $kriteria->prodi }}, silahkan segera melakukan daftar ulang<br>
                                        Catatan : dalam waktu 3 hari tidak melakukan daftar ulang dinyatakan mengundurkan diri
                                     @else
                                     mohon maaf sayang sekali {{ Auth::user()->name }} anda belum dapat bergabung di program studi {{ $kriteria->prodi }} dikarenakan slot kuota KIP di program studi {{ $kriteria->prodi }} sudah penuh.
                                     @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
