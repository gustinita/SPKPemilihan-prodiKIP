@extends('layout.mastercode')
@section('content')
<h1>Edit Data</h1>

<form action="/biodatacalonmhs/{{$biodatacln->id}}" method="POST">
    @method('put')
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label>Kode Registrasi</label><br>
            <input type="text" name="kode_regis" class="form-control" placeholder="Kode Registrasi" value="{{$biodatacln->kode_regis}}">
        </div>
        <div class="form-group">
            <label>Tahun</label><br>
            <input type="text" name="tahun" class="form-control" placeholder="Tahun" value="{{$biodatacln->tahun}}">
        </div>
        <div class="form-group">
            <label>Nama</label><br>
            <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{$biodatacln->nama}}">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label><br>
            <div name="jenis_kelamin" class="form-group">
            <select class="form-control" required name="jenis_kelamin">
            <option >Perempuan</option>
            <option >Laki-laki</option>
            </select>
            </div>
        </div>
        <div class="form-group">
            <label>Agama</label><br>
            <input type="text" name="agama" class="form-control" placeholder="Agama" value="{{$biodatacln->agama}}">
        </div>
        <div class="form-group">
            <label>Pilihan Prodi 1</label><br>
            <div name="prodi1" class="form-group">
            <select class="form-control" required name="prodi1">
            <option >Informatika</option>
            <option >Arsitek</option>
            <option >Perencanaan Wilayah dan Kota</option>
            <option >Teknik Sipil</option>
            </select>
            </div>
        </div>
        <div class="form-group">
            <label>Pilihan Prodi 2</label><br>
            <div name="prodi2" class="form-group">
            <select class="form-control" required name="prodi2">
            <option >Informatika</option>
            <option >Arsitek</option>
            <option >Perencanaan Wilayah dan Kota</option>
            <option >Teknik Sipil</option>
            </select>
            </div>
        </div>
        <div class="form-group">
            <label>Pilihan Prodi 3</label><br>
            <div name="prodi3" class="form-group">
            <select class="form-control" required name="prodi3">
            <option >Informatika</option>
            <option >Arsitek</option>
            <option >Perencanaan Wilayah dan Kota</option>
            <option >Teknik Sipil</option>
            </select>
            </div>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label><br>
            <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="{{$biodatacln->tanggal_lahir}}">
        </div>
        <div class="form-group">
            <label>Email</label><br>
            <input type="text" name="email" class="form-control" placeholder="Email" value="{{$biodatacln->email}}">
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-info btn-sm">Update</button>
            <a href="/biodatacalonmhs">
            </a>
</form>
@endsection