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
                        <h3 class="m-0 font-weight-bold text-info">Data Pengajuan
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Kode Registrasi</th>
                                    <th>Nama</th>
                                    <th>Program Studi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                    
                                </tr>
                               @foreach ($validasi as $v)
                          
                                <tr>

                                    <td>{{$v->kode_registrasi}}</td>
                                    <td>{{$v->nama}}</td>
                                    <td>{{$v->prodi}}</td>
                                    <td>{{$v->status}}</td>
                                    <td>
                                        @if($v->status == 'MENUNGGU')
                                        <div class="btn-group">
                                            <a href="{{url('datapengajuan/'.$v->id.'/setuju')}}" class="btn btn-success">Setuju</a>
                                            <a href="{{url('datapengajuan/'.$v->id.'/tolak')}}" class="btn btn-danger">Tolak</a>
                                        </div>
                                        @endif

                                    </td>
                       
                      </tr>
                      @endforeach
                                    
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