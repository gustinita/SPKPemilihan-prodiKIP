@extends('layout.mastercode')
@section('content')

<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="m-0 font-weight-bold text-info">Biodata  <a href="/biodatacalonmhs/create"><input type="submit" value="TAMBAH DATA" class="btn btn-info float-right"></a></h3>
                    </div>
                    <div class="card-body">

                    <div class="card-body">
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
                                <th>Tanggal lahir</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach($biodatacln as $c)
                            <tr>
                                <td>{{$c->kode_regis}}</td>
                                <td>{{$c->tahun}}</td>
                                <td>{{$c->nama}}</td>
                                <td>{{$c->jenis_kelamin}}</td>
                                <td>{{$c->agama}}</td>
                                <td>{{$c->prodi1}}</td>
                                <td>{{$c->prodi2}}</td>
                                <td>{{$c->prodi3}}</td>
                                <td>{{$c->tanggal_lahir}}</td>
                                <td>{{$c->email}}</td>
                                <td>
                                <a href="/biodatacalonmhs/{{$c->id}}/edit"><button class="btn btn-edit fas fa-edit" style="background-color:lightblue"></button></a>
                                            <form action="/biodatacalonmhs/{{$c->id}}" method="POST">
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection