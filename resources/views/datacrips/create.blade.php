@extends('layout.mastercode')
@section('content')
<h1>Create Data</h1>

<form action="/datacrips/store" method="POST">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label>Nilai Matematika</label><br>
            <input type="text" name="nilaimtk" class="form-control" placeholder="Nilai Matematika">
        </div>
        <div class="form-group">
            <label>Kategori</label><br>
            <input type="text" name="kategori" class="form-control" placeholder="Kategori">
        </div>
        <div class="form-group">
            <label>Nilai</label><br>
            <input type="text" name="nilai" class="form-control" placeholder="Nilai">
        </div>
        <input type="submit" name="submit" class="btn btn-info btn-sm" value="Save">
</form>
@endsection