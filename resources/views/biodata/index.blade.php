@extends('layout.mastercode')
@section('content')
<section class="content-header">
   <!-- /.container-fluid -->
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card border-left-info">
                    <div class="card-header">
                        <h3 class="m-0 font-weight-bold text-info">Biodata Saya</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                @if($datamhs == null)
                                <tr>
                                    <th colspan="4">

                                        <form action="{{url('biodatacalonmhs/save')}}" method="get">
                                            <div class="input-group">    
                                            <input type="text" class="form-control" placeholder="masukkan kode registrasi" name="kode_registrasi" id="kode_registrasi" required>
                                             <div class="input-group-append">
                                                <button class="btn btn-info" type="submit" id="buttonSave" disabled>Simpan Data</button>
                                              </div>
                                            </div>
                                        </form>

                                    </th>
                                </tr>
                                @endif

                                <tr style="white-space: nowrap;">
                                    <th>Kode Registrasi</th>
                                    <th>Tahun</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Pilihan Prodi 1</th>
                                    <th>Pilihan Prodi 2</th>
                                    <th>Pilihan Prodi 3</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Email</th>
                                </tr>
                            @if($datamhs != null)
                                <tr>
                                    <td>{{$datamhs->kode_registrasi}}</td>
                                    <td>{{$datamhs->tahun}}</td>
                                    <td>{{$datamhs->nama}}</td>
                                    <td>{{$datamhs->jenis_kelamin}}</td>
                                    <td>{{$datamhs->agama}}</td>
                                    <td>{{$datamhs->prodi1}}</td>
                                    <td>{{$datamhs->prodi2}}</td>
                                    <td>{{$datamhs->prodi3}}</td>
                                    <td>{{$datamhs->tanggal_lahir}}</td>
                                    <td>{{$datamhs->email}}</td>
                                </tr>
                            @else 
                            <tr>
                                <td colspan="25">Biodata belum tersimpan.</td>
                            </tr>
                            @endif
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
