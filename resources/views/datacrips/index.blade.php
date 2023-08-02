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
                        <h3 class="m-0 font-weight-bold text-info">Data Crips
                        <a href="/datacalonmhs/create"><input type="submit" value="TAMBAH DATA" class="btn btn-info float-right"></a></h3>
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                        <h3 class="card-title">Nilai Kriteria Matematika</h3>
                    </div>
                        <table class="table table-bordered">
                            <tr>
                                <th>Nilai Matematika (C1)</th>
                                <th>Kategori</th>
                                <th>Nilai</th>
                            </tr>
                            @foreach($crips->where('tipe', '1') as $c)
                            <tr>
                                <td>{{$c->nilaimtk}}</td>
                                <td>{{$c->kategori}}</td>
                                <td>{{$c->nilai}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
                    <div class="card-body">
                        <div class="table table-responsive">
                        <h3 class="card-title">Nilai Kriteria Bahasa Inggris</h3>
                    </div>
                        <table class="table table-bordered">
                            <tr>
                                <th>Nilai Bahasa Inggris (C2)</th>
                                <th>Kategori</th>
                                <th>Nilai</th>
                            </tr>
                            @foreach($crips->where('tipe', '1') as $c)
                            <tr>
                                <td>{{$c->nilaimtk}}</td>
                                <td>{{$c->kategori}}</td>
                                <td>{{$c->nilai}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card border-left-info">
                    <div class="card-body">
                        <div class="table table-responsive">
                        <h3 class="card-title">Nilai Kriteria Tes Psikotest</h3>
                    </div>
                        <table class="table table-bordered">
                            <tr>
                                <th>Nilai Tes Psikotes (C3)</th>
                                <th>Kategori</th>
                                <th>Nilai</th>
                            </tr>
                            @foreach($crips->where('tipe', '1') as $c)
                            <tr>
                                <td>{{$c->nilaimtk}}</td>
                                <td>{{$c->kategori}}</td>
                                <td>{{$c->nilai}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card border-left-info">
                    <div class="card-body">
                        <div class="table table-responsive">
                        <h3 class="card-title">Nilai Kriteria Senibudaya</h3>
                    </div>
                        <table class="table table-bordered">
                            <tr>
                                <th>Nilai Senibudaya (C4)</th>
                                <th>Kategori</th>
                                <th>Nilai</th>
                            </tr>
                            @foreach($crips->where('tipe', '1') as $c)
                            <tr>
                                <td>{{$c->nilaimtk}}</td>
                                <td>{{$c->kategori}}</td>
                                <td>{{$c->nilai}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card border-left-info">
                    <div class="card-body">
                        <div class="table table-responsive">
                        <h3 class="card-title">Penghasilan Orang tua</h3>
                    </div>
                        <table class="table table-bordered">
                            <tr>
                                <th>Penghasilan Orang tua (C5)</th>
                                <th>Nilai</th>
                            </tr>
                            @foreach($crips->where('tipe', '2') as $c)
                            <tr>
                                <td>{{$c->nilaimtk}}</td>
                                <td>{{$c->nilai}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection