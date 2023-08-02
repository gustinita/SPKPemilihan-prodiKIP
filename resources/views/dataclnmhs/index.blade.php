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
                        <h3 class="m-0 font-weight-bold text-info">Data Calon Mahasiswa KIP
                        <a href="/datacalonmhs/create"><input type="submit" value="TAMBAH DATA" class="btn btn-info float-right"></a></h3>
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table table-bordered">
                                <tr>
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
                                    <th>Aksi</th>
                                </tr>
                                @foreach($datamhs as $d)
                                <tr>
                                    <td>{{$d->kode_registrasi}}</td>
                                    <td>{{$d->tahun}}</td>
                                    <td>{{$d->nama}}</td>
                                    <td>{{$d->jenis_kelamin}}</td>
                                    <td>{{$d->agama}}</td>
                                    <td>{{$d->prodi1}}</td>
                                    <td>{{$d->prodi2}}</td>
                                    <td>{{$d->prodi3}}</td>
                                    <td>{{$d->tanggal_lahir}}</td>
                                    <td>{{$d->email}}</td>
                                    <td>
                                    <a href="/datacalonmhs/{{$d->id}}/edit"><button class="btn btn-edit fas fa-edit" style="background-color:lightblue"></button></a>
                                            <form action="/datacalonmhs/{{$d->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger fas fa-trash-alt" href="/datacalonmhs" input type="submit" value="Delete"></button>
                                        </form>
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