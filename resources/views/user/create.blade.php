@extends('layout.mastercode')
@section('content')

<div class="card card-primary">
    <div class="card-header text-primary">
        Tambah Data
    </div>
    <div class="card-body">
    <form action="/biodatacalonmhs/store" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
            <label>Kode Registrasi</label><br>
            <input type="text" name="kode_regis" class="form-control" placeholder="Kode Registrasi">
        </div>
        <div class="form-group">
            <label>Tahun</label><br>
            <input type="text" name="tahun" class="form-control" placeholder="Tahun">
        </div>
        <div class="form-group">
            <label>Nama</label><br>
            <input type="text" name="nama" class="form-control" placeholder="Nama">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label><br>
            <div name="jenis_kelamin" class="form-group">
            <select class="form-control" required name="jenis_kelamin">
            <option value="">Pilih Jenis Kelamin</option>
            <option value="Perempuan">Perempuan</option>
            <option value="Laki-Laki">Laki-laki</option>
            </select>
            </div>
        </div>
        <div class="form-group">
            <label>Agama</label><br>
            <input type="text" name="agama" class="form-control" placeholder="Agama">
        </div>
        <div class="form-group">
            <label>Pilihan Prodi 1</label><br>
            <div name="prodi1" class="form-group">
            <select class="form-control" required name="prodi1">
                <option >Pilih Opsi Program Studi 1</option>
                <option value="Informatika">Informatika</option>
                <option value="Arsitek">Arsitek</option>
                <option value="Perencanaan Wilayah dan Kota">Perencanaan Wilayah dan Kota</option>
                <option value="Teknik Sipil">Teknik Sipil</option>
            </select>
            </div>
        </div>
        <div class="form-group">
            <label>Pilihan Prodi 2</label><br>
            <div name="prodi2" class="form-group">
            <select class="form-control" required name="prodi2">
                <option >Pilih Opsi Program Studi 2</option>
                <option value="Informatika">Informatika</option>
                <option value="Arsitek">Arsitek</option>
                <option value="Perencanaan Wilayah dan Kota">Perencanaan Wilayah dan Kota</option>
                <option value="Teknik Sipil">Teknik Sipil</option>
            </select>
            </div>
        </div>
        <div class="form-group">
            <label>Pilihan Prodi 3</label><br>
            <div name="prodi3" class="form-group">
            <select class="form-control" required name="prodi3">
                <option>Pilih Opsi Program Studi 3</option>
                <option value="Informatika">Informatika</option>
                <option value="Arsitek">Arsitek</option>
                <option value="Perencanaan Wilayah dan Kota">Perencanaan Wilayah dan Kota</option>
                <option value="Teknik Sipil">Teknik Sipil</option>
            </select>
            </div>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label><br>
            <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir">
        </div>
        <div class="form-group">
            <label>Email</label><br>
            <input type="text" name="email" class="form-control" placeholder="Email">
        </div>
        <input type="submit" name="submit" class="btn btn-info btn-sm" value="Save">
    </form>
    </div>
</div>

@endsection