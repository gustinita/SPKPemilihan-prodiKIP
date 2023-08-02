@extends('layout.mastercode')
@section('content')
<h1>Create Data</h1>

<form action="/kuotakip/store" method="POST">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label>Informatika</label><br>
            <input type="text" name="informatika" class="form-control" placeholder="Informatika">
        </div>
        <div class="form-group">
            <label>Arsitek</label><br>
            <input type="text" name="arsitek" class="form-control" placeholder="Arsitek">
        </div>
        <div class="form-group">
            <label>PWK</label><br>
            <input type="text" name="pwk" class="form-control" placeholder="PWK">
        </div>
        <div class="form-group">
            <label>Sipil</label><br>
            <input type="text" name="sipil" class="form-control" placeholder="Sipil">
        </div>
        <input type="submit" name="submit" class="btn btn-info btn-sm" value="Save">
</form>
@endsection