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
                                        <th>Kode Reg</th>
                                        <th>Nama</th>
                                        <th>Upload Berkas</th>
                                        <th>Status Berkas</th>
                                    </tr>
                                    <tbody>
                                            <tr>
                                                <td>{{ $kriteria->kode_registrasi }}</td>
                                                <td>{{ $kriteria->nama }}</td>
                                                <td>
                                                    @if($kriteria->berkas == '')
                                                        <form action="{{url('daftarulang/update', $kriteria->id)}}" method="post"  enctype="multipart/form-data">
                                                             @method('put')
    @csrf   
                                                            <div class="input-group">
                                                              <div class="input-group-prepend">
                                                                    <span class="input-group-text">Berkas Persetujuan</span>
                                                                  </div>
                                                            <input type="file" required class="form-control" name="berkas">
                                                            </div>
                                                            <div class="input-group mt-2">
                                                              <div class="input-group-prepend">
                                                                    <span class="input-group-text">Berkas Akta</span>
                                                                  </div>
                                                            <input type="file" required class="form-control" name="berkas_akta">
                                                            </div>
                                                            <div class="input-group mt-2">
                                                              <div class="input-group-prepend">
                                                                    <span class="input-group-text">Berkas KK</span>
                                                                  </div>
                                                            <input type="file" required class="form-control" name="berkas_kk">
                                                            </div>
                                                            <div class="input-group mt-2">
                                                              <div class="input-group-prepend">
                                                                    <span class="input-group-text">Berkas Ijazah</span>
                                                                  </div>
                                                            <input type="file" required class="form-control" name="berkas_ijazah">
                                                            </div>

                                                            <button type="submit" class="btn btn-primary">Upload</button>
                                                        </form>
                                                    @else
                                                        <a target="_blank" href="{{url('berkas', $kriteria->berkas)}}">[Lihat Berkas Persetujuan : {{$kriteria->berkas}}]</a> <br>
                                                        <a target="_blank" href="{{url('berkas', $kriteria->berkas_akta)}}">[Lihat Berkas Akta : {{$kriteria->berkas_akta}}]</a><br>
                                                        <a target="_blank" href="{{url('berkas', $kriteria->berkas_kk)}}">[Lihat Berkas KK : {{$kriteria->berkas_kk}}]</a><br>
                                                        <a target="_blank" href="{{url('berkas', $kriteria->berkas_ijazah)}}">[Lihat Berkas Ijazah : {{$kriteria->berkas_ijazah}}]</a>
                                                    @endif
                                                </td>
                                                <td>{{$kriteria->status_berkas}}</td>
                                            </tr>
                                            @php @endphp
                                    </tbody>
                                </table>

                                <div class="alert {{($kriteria->status_berkas == 'SUDAH DIVERIFIKASI' ? 'alert-success' : 'alert-danger')}}" style="display: {{$kriteria->status_berkas != 'MENUNGGU' ? 'inline-block' : 'none'}};">
                                    @if($kriteria->status_berkas == 'SUDAH DIVERIFIKASI')
                                     berhasil melakukan daftar ulang.
                                     @else
                                     Silahkan upload ulang berkas anda.
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
