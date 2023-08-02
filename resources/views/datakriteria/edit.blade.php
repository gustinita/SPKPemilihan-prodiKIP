@extends('layout.mastercode')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">SPK PEMILIHAN PRODI - EDIT</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit</h3>
                    </div>
                    <div class="card-body">
               <form action="/kriteria/{{$kriteria->id}}" method="POST">
    @method('put')
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label>Program Studi</label><br>
            <div id="kode1" class="form-group">
            <select class="form-control" required name="kode1" id = "kode1">
            <option value="A1" {{($kriteria->kode1 == 'A1' ? 'selected' : '')}}>Informatika</option>
            <option value="A2" {{($kriteria->kode1 == 'A2' ? 'selected' : '')}}>Arsitek</option>
            <option value="A3" {{($kriteria->kode1 == 'A3' ? 'selected' : '')}}>Perencanaan Wilayah dan Kota</option>
            <option value="A4" {{($kriteria->kode1 == 'A4' ? 'selected' : '')}}>Teknik Sipil</option>
            </select>
            </div>
        </div>
        <div class="form-group">
            <label>Program Studi</label><br>
            <div id="kode2" class="form-group">
                <select class="form-control" required name="kode2" id = "kode2">
                    <option value="A1" {{($kriteria->kode2 == 'A1' ? 'selected' : '')}}>Informatika</option>
                    <option value="A2" {{($kriteria->kode2 == 'A2' ? 'selected' : '')}}>Arsitek</option>
                    <option value="A3" {{($kriteria->kode2 == 'A3' ? 'selected' : '')}}>Perencanaan Wilayah dan Kota</option>
                    <option value="A4" {{($kriteria->kode2 == 'A4' ? 'selected' : '')}}>Teknik Sipil</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Program Studi</label><br>
            <div id="kode3" class="form-group">
                <select class="form-control" required name="kode3" id = "kode3">
                    <option value="A1" {{($kriteria->kode3 == 'A1' ? 'selected' : '')}}>Informatika</option>
                    <option value="A2" {{($kriteria->kode3 == 'A2' ? 'selected' : '')}}>Arsitek</option>
                    <option value="A3" {{($kriteria->kode3 == 'A3' ? 'selected' : '')}}>Perencanaan Wilayah dan Kota</option>
                    <option value="A4" {{($kriteria->kode3 == 'A4' ? 'selected' : '')}}>Teknik Sipil</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Nilai Matematika</label><br>
            <input type="number" min="0" minlength="1" name="c1" class="form-control" value="{{$kriteria->c1}}" required placeholder="Nilai Matematika">
        </div>
        <div class="form-group">
            <label>Nilai Bahasa Inggris</label><br>
            <input type="number" min="0" minlength="1" name="c2" value="{{$kriteria->c2}}" class="form-control" placeholder="Nilai Bahasa Inggris">
        </div>
        <div class="form-group">
            <label>Nilai Tes Psikotes</label><br>
            <input type="number" min="0" minlength="1" name="c3" value="{{$kriteria->c3}}" class="form-control" placeholder="Nilai Tes Psikotes">
        </div>
        <div class="form-group">
            <label>Nilai Tes soal Prodi</label><br>
            <input type="number" min="0" minlength="1" value="{{$kriteria->c4}}" name="c4" class="form-control" placeholder="Nilai Tes soal Prodi">
        </div>
        <div class="form-group">
            <label>Penghasilan orang tua</label><br>
            <input type="text" min="0" minlength="1" value="{{$penghasilan}}" id = "c5" name="c5" class="form-control" placeholder="Penghasilan orang tua">
        </div>
        <input type="submit" name="submit" class="btn btn-info btn-sm" value="Update">
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    let dengan_rupiah = document.getElementById('c5');
    dengan_rupiah.addEventListener('keyup', function () {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    let kode1 = document.getElementById("kode1");
    let kode2 = document.getElementById("kode2");
    let kode3 = document.getElementById("kode3");

    kode1.addEventListener('change', function (e) {
        let kode1 = $('#kode1').find(":selected").val();
        let kode2 = $('#kode2').find(":selected").val();
        let kode3 = $('#kode3').find(":selected").val();

        $('#kode1 option').prop('disabled', false);
        $('#kode2 option').prop('disabled', false);
        $('#kode3 option').prop('disabled', false);

        $('#kode1 option[value="' + kode2 + '"]').prop('disabled', true);
        $('#kode1 option[value="' + kode3 + '"]').prop('disabled', true);
        $('#kode2 option[value="' + kode1 + '"]').prop('disabled', true);
        $('#kode2 option[value="' + kode3 + '"]').prop('disabled', true);
        $('#kode3 option[value="' + kode1 + '"]').prop('disabled', true);
        $('#kode3 option[value="' + kode2 + '"]').prop('disabled', true);
    });

    kode2.addEventListener('change', function (e) {
        let kode1 = $('#kode1').find(":selected").val();
        let kode2 = $('#kode2').find(":selected").val();
        let kode3 = $('#kode3').find(":selected").val();

        $('#kode1 option').prop('disabled', false);
        $('#kode2 option').prop('disabled', false);
        $('#kode3 option').prop('disabled', false);

        $('#kode1 option[value="' + kode2 + '"]').prop('disabled', true);
        $('#kode1 option[value="' + kode3 + '"]').prop('disabled', true);
        $('#kode2 option[value="' + kode1 + '"]').prop('disabled', true);
        $('#kode2 option[value="' + kode3 + '"]').prop('disabled', true);
        $('#kode3 option[value="' + kode1 + '"]').prop('disabled', true);
        $('#kode3 option[value="' + kode2 + '"]').prop('disabled', true);
    });

    kode3.addEventListener('change', function (e) {
        let kode1 = $('#kode1').find(":selected").val();
        let kode2 = $('#kode2').find(":selected").val();
        let kode3 = $('#kode3').find(":selected").val();

        $('#kode1 option').prop('disabled', false);
        $('#kode2 option').prop('disabled', false);
        $('#kode3 option').prop('disabled', false);

        $('#kode1 option[value="' + kode2 + '"]').prop('disabled', true);
        $('#kode1 option[value="' + kode3 + '"]').prop('disabled', true);
        $('#kode2 option[value="' + kode1 + '"]').prop('disabled', true);
        $('#kode2 option[value="' + kode3 + '"]').prop('disabled', true);
        $('#kode3 option[value="' + kode1 + '"]').prop('disabled', true);
        $('#kode3 option[value="' + kode2 + '"]').prop('disabled', true);
    });
</script>
@endsection
