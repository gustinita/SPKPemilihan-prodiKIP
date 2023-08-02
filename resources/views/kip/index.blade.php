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
                        <h3 class="m-0 font-weight-bold text-info">Slot Kuota KIP Program Studi</a></h3>
                    </div>
                    <div class="card-body">

                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr>
                                <th colspan="2">Informatika</th>
                                <th colspan="2">Arsitek</th>
                                <th colspan="2">PWK</th>
                                <th colspan="2">Sipil</th>
                                <th rowspan="2" style="vertical-align: middle;">Aksi</th>
                            </tr>
                            <tr>
                                <th>Awal</th>
                                <th>Sisa</th>
                                <th>Awal</th>
                                <th>Sisa</th>
                                <th>Awal</th>
                                <th>Sisa</th>
                                <th>Awal</th>
                                <th>Sisa</th>
                            </tr>
                            <tr>
                                <td>{{$k->informatika}}</td>
                                <td>{{$k->informatika - $cek_kuota_informatika}}</td>
                                <td>{{$k->arsitek}}</td>
                                <td>{{$k->arsitek - $cek_kuota_arsitek}}</td>
                                <td>{{$k->pwk}}</td>
                                <td>{{$k->pwk - $cek_kuota_pwk}}</td>
                                <td>{{$k->sipil}}</td>
                                <td>{{$k->sipil - $cek_kuota_sipil}}</td>
                                <td>
                                <a href="/kuotakip/{{$k->id}}/edit"><button class="btn btn-edit fas fa-edit" style="background-color:lightblue"></button></a>
                                            <form action="/kuotakip/{{$k->id}}" method="POST">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection