@extends('layout.mastercode')
@section('content')
<style type="text/css">
    th {
        vertical-align: top !important;
    }
</style>
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
                        <h3 class="m-0 font-weight-bold text-info">Perhitungan Algoritma SAW
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table table-bordered">
                                <h3 class="card-title">Update Benefit SAW</h3>
                        </div>
                        @if (session()->has('message'))
                        <div class="alert alert-info">
                            {{ session('message') }}
                        </div>
                        @endif
                        @foreach ($saws as $saw)
                        {{ $saw->kode }} |
                        {{ $saw->kode == 'A1' ? 'Informatika' : ($saw->kode == 'A2' ? 'Arsitek' : ($saw->kode == 'A3' ? 'PWK' : 'Sipil')) }}
                        <form action="{{ url('/saw/update/' . $saw->id) }}" method="POST">
                            @method('post')
                            @csrf
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="input-group ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text form-control-sm">C1</span>
                                                </div>
                                                <input type="number" min="0" minlength="1" class="form-control form-control-sm" name="b_c1" value="{{ $saw->b_c1 }}" required>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="input-group ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text form-control-sm">C2</span>
                                                </div>
                                                <input type="number" min="0" minlength="1" class="form-control form-control-sm" name="b_c2" value="{{ $saw->b_c2 }}" required>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="input-group ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text form-control-sm">C3</span>
                                                </div>
                                                <input type="number" min="0" minlength="1" class="form-control form-control-sm" name="b_c3" value="{{ $saw->b_c3 }}" required>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="input-group ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text form-control-sm">C4</span>
                                                </div>
                                                <input type="number" min="0" minlength="1" class="form-control form-control-sm" name="b_c4" value="{{ $saw->b_c4 }}" required>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="input-group ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text form-control-sm">C5</span>
                                                </div>
                                                <input type="number" min="0" minlength="1" class="form-control form-control-sm" name="b_c5" value="{{ $saw->b_c5 }}" required>
                                            </div>
                                        </th>
                                        <th><button type="submit" class="btn btn-xs btn-info">Update</button></th>
                                    </tr>
                                </thead>

                            </table>
                        </form>
                        @endforeach
                    </div>
                </div>



                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Penentuan Prodi : <span class="float-right">
                                <form method='get' id="formSelect">
                                    <select class="form-control form-control-sm" name="mhs_id" id="select" onchange="this.form.submit()">
                                        <option value="">(Pilih Mahasiswa)</option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $mhs_id == $user->id ? 'selected' : '' }}>{{ $user->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </form>

                            </span></h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if ($kriteria)
                            <table class="table table-bordered">
                                <tr>
                                    <th>Kode</th>
                                    <th>Program Studi</th>
                                </tr>
                                <tbody>
                                   
                                    <tr>
                                        <td>{{ $kriteria->hasil1 }}</td>
                                        <td>{{ $kriteria->prodi }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            @else
                            <div class="alert alert-danger">
                                Data Perhitungan Mahasiswa tidak ditemukan.
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection