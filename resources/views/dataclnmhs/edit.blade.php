@extends('layout.mastercode')
@section('content')

<div class="card card-primary">
    <div class="card-header text-primary">
        Edit Data
    </div>
                                <form action="/datacalonmhs/{{$datamhs->id}}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Kode Registrasi</label><br>
                                            <input type="text" name="kode_registrasi" class="form-control" placeholder="Kode Registrasi" value="{{$datamhs->kode_registrasi}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun</label><br>
                                            <input type="text" name="tahun" class="form-control" placeholder="Tahun" value="{{$datamhs->tahun}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label><br>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{$datamhs->nama}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Pilihan Prodi 1</label><br>
                                            <input type="text" name="prodi1" class="form-control" placeholder="Pilihan Prodi 1" value="{{$datamhs->prodi1}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Pilihan Prodi 2</label><br>
                                            <input type="text" name="prodi2" class="form-control" placeholder="Pilihan Prodi 2" value="{{$datamhs->prodi2}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Pilihan Prodi 3</label><br>
                                            <input type="text" name="prodi3" class="form-control" placeholder="Pilihan Prodi 3" value="{{$datamhs->prodi3}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label><br>
                                            <input type="text" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="{{$datamhs->tanggal_lahir}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label><br>
                                            <input type="text" name="email" class="form-control" placeholder="Email" value="{{$datamhs->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label>User ID (kosongi jika ingin reset)</label><br>
                                            <input type="text" name="user_id" class="form-control" placeholder="User ID" value="{{$datamhs->user_id}}">
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" name="submit" class="btn btn-info btn-sm">Update</button>
                                            <a href="/dataclnmhs">
                                            </a>
                                </form>
                                @endsection
                            