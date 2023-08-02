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
                            <h3 class="m-0 font-weight-bold text-info">Daftar Ulang
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
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
                                                        <a target="_blank" href="{{url('berkas', $kriteria->berkas)}}">[Lihat Berkas Persetujuan : {{$kriteria->berkas}}]</a> <br>
                                                        <a target="_blank" href="{{url('berkas', $kriteria->berkas_akta)}}">[Lihat Berkas Akta : {{$kriteria->berkas_akta}}]</a><br>
                                                        <a target="_blank" href="{{url('berkas', $kriteria->berkas_kk)}}">[Lihat Berkas KK : {{$kriteria->berkas_kk}}]</a><br>
                                                        <a target="_blank" href="{{url('berkas', $kriteria->berkas_ijazah)}}">[Lihat Berkas Ijazah : {{$kriteria->berkas_ijazah}}]</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($kriteria->status_berkas == 'MENUNGGU')
                                                        @if($kriteria->berkas != '')
                                                            <div class="btn-group">
                                                                <a href="{{url('daftarulang/'.$kriteria->id.'/setuju')}}" class="btn btn-success">Berkas sudah benar</a>
                                                                <a href="{{url('daftarulang/'.$kriteria->id.'/tolak')}}" class="btn btn-danger">Berkas salah</a>
                                                            </div>

                                                            @endif

                                                            @else

                                                            {{$kriteria->status_berkas}}
                                                            @endif

                                                </td>
                                            </tr>
                                            @endforeach
                                            @php @endphp
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
