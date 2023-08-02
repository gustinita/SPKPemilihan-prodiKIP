@extends('layout.mastercode')
@section('content')

<div class="card card-primary">
    <div class="card-header text-primary">
        Tambah Data
    </div>
    <form action="/datacalonmhs/store" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Kode Registrasi</label><br>
                <input type="text" name="kode_registrasi" class="form-control" placeholder="Kode Registrasi">
            </div>
            <div class="form-group">
                <label>Tahun</label><br>
                <input type="date" name="tahun" class="form-control" placeholder="Tahun">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label><br>
                <input type="text" name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin">
            </div>
            <div class="form-group">
                <label>Agama</label><br>
                <input type="text" name="agama" class="form-control" placeholder="Agama">
            </div>
            <div class="form-group">
                <label>Pilihan Prodi 1</label><br>
                <input type="text" name="prodi1" class="form-control" placeholder="Pilihan Prodi 1">
            </div>
            <div class="form-group">
                <label>Pilihan Prodi 2</label><br>
                <input type="text" name="prodi2" class="form-control" placeholder="Pilihan Prodi 2">
            </div>
            <div class="form-group">
                <label>Pilihan Prodi 3</label><br>
                <input type="text" name="prodi3" class="form-control" placeholder="Pilihan Prodi 3">
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label><br>
                <input type="text" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir">
            </div>
            <div class="form-group">
                <label>Email</label><br>
                <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
            <input type="submit" name="submit" class="btn btn-info btn-sm" value="Save">
    </form>
    @endsection