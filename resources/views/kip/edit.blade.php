@extends('layout.mastercode')
@section('content')
<h1>Edit Data</h1>

<form action="/kuotakip/{{$kuotakip->id}}" method="POST">
    @method('put')
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label>Informatika</label><br>
            <input type="text" name="informatika" class="form-control" placeholder="Informatika" value="{{$kuotakip->informatika}}">
        </div>
        <div class="form-group">
            <label>Arsitek</label><br>
            <input type="text" name="arsitek" class="form-control" placeholder="Arsitek" value="{{$kuotakip->arsitek}}">
        </div>
        <div class="form-group">
            <label>PWK</label><br>
            <input type="text" name="pwk" class="form-control" placeholder="PWK" value="{{$kuotakip->pwk}}">
        </div>
        <div class="form-group">
            <label>Sipil</label><br>
            <input type="text" name="sipil" class="form-control" placeholder="Sipil" value="{{$kuotakip->sipil}}">
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-info btn-sm">Update</button>
            <a href="/kuotakip">
            </a>
</form>
@endsection