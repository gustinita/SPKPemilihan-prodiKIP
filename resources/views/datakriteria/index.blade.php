@extends('layout.mastercode')
@section('content')
    <style type="text/css">
        td {
            text-align: center !important;
        }
    </style>
    <!-- /.content-header -->

    <!-- Main content -->
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
                            <h3 class="m-0 font-weight-bold text-info">Pilih Prodi dan Masukkan Nilai Kriteria</h3>
                            @if($rowCount > 0)
                                <a href="/kriteria/create"><input type="submit" value="TAMBAH DATA" class="btn btn-info float-right" disabled></a>
                            @else
                                <a href="/kriteria/create"><input type="submit" value="TAMBAH DATA" class="btn btn-info float-right"></a>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered">
                                    @if(session()->has('message'))
                                        <div class="alert alert-info">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Program Studi 1</th>
                                                <th>Program Studi 2</th>
                                                <th>Program Studi 3</th>
                                                <th>(C1) Nilai Matematika</th>
                                                <th>(C2) Nilai Bahasa Inggris</th>
                                                <th>(C3) Nilai Tes Psikotes</th>
                                                <th>(C4) Nilai Seni Budaya</th>
                                                <th>(C5) Penghasilan Orangtua</th>
                                                <th>Aksi</th>
                                            </tr>
                                            @foreach($kriteria as $k)
                                                <tr>
                                                    <td>
                                                        @if($k->kode1 == 'A1')
                                                            Informatika
                                                        @elseif($k->kode1 == 'A2')
                                                            Arsitek
                                                        @elseif($k->kode1 == 'A3')
                                                            Perencanaan Wilayah dan Kota
                                                        @else
                                                            Teknik Sipil
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($k->kode2 == 'A1')
                                                            Informatika
                                                        @elseif($k->kode2 == 'A2')
                                                            Arsitek
                                                        @elseif($k->kode2 == 'A3')
                                                            Perencanaan Wilayah dan Kota
                                                        @else
                                                            Teknik Sipil
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($k->kode3 == 'A1')
                                                            Informatika
                                                        @elseif($k->kode3 == 'A2')
                                                            Arsitek
                                                        @elseif($k->kode3 == 'A3')
                                                            Perencanaan Wilayah dan Kota
                                                        @else
                                                            Teknik Sipil
                                                        @endif
                                                    </td>
                                                    <td>{{$k->c1}}</td>
                                                    <td>{{$k->c2}}</td>
                                                    <td>{{$k->c3}}</td>
                                                    <td>{{$k->c4}}</td>
                                                    <td>{{currency($k->c5)}}</td>
                                                    <td>
                                                        <a href="/kriteria/{{$k->id}}/edit">
                                                            <button class="btn btn-edit fas fa-edit"
                                                                    style="background-color:lightblue"></button>
                                                        </a>
                                                        <form action="/kriteria/{{$k->id}}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger fas fa-trash-alt"
                                                                    href="/kriteria" input type="submit"
                                                                    value="Delete"></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
