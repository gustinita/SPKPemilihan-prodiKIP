@extends('layout.mastercode')
@section('content')

<div class="card card-primary">
    <div class="card-header text-primary">
        Tambah Data
    </div>
                        @if(session()->has('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
 @endif
                        <form action="/kriteria/store" method="POST">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label>Program Studi 1</label><br>
            <div id="kode1" class="form-group">
            <select class="form-control" required name="kode1" id = "kode1">
            <option value="">Pilih Program Studi</option>
            <option value="A1">Informatika</option>
            <option value="A2">Arsitek</option>
            <option value="A3">Perencanaan Wilayah dan Kota</option>
            <option value="A4">Teknik Sipil</option>
            </select>
            </div>
        </div>
        <div class="form-group">
            <label>Program Studi 2</label><br>
            <div id="kode2" class="form-group">
                <select class="form-control" required name="kode2" id = "kode2">
                    <option value="">Pilih Program Studi</option>
                    <option value="A1">Informatika</option>
                    <option value="A2">Arsitek</option>
                    <option value="A3">Perencanaan Wilayah dan Kota</option>
                    <option value="A4">Teknik Sipil</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Program Studi 3</label><br>
            <div id="kode3" class="form-group">
                <select class="form-control" required name="kode3" id = "kode3">
                    <option value="">Pilih Program Studi</option>
                    <option value="A1">Informatika</option>
                    <option value="A2">Arsitek</option>
                    <option value="A3">Perencanaan Wilayah dan Kota</option>
                    <option value="A4">Teknik Sipil</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Nilai Matematika</label><br>
            <input type="number" min="0" minlength="1" name="c1" max="100" class="form-control max" id="n1" required placeholder="Nilai Matematika">
        </div>
        <div class="form-group">
            <label>Nilai Bahasa Inggris</label><br>
            <input type="number" min="0" minlength="1" name="c2"  max="100" id="n2" class="form-control max" placeholder="Nilai Bahasa Inggris">
        </div>
        <div class="form-group">
            <label>Nilai Tes Psikotes</label><br>
            <input type="number" min="0" minlength="1" name="c3"  max="100" id="n3" class="form-control max" placeholder="Nilai Tes Psikotes">
        </div>
        <div class="form-group">
            <label>Nilai Seni Budaya</label><br>
            <input type="number" min="0" minlength="1" name="c4"  max="100" id="n4" class="form-control max" placeholder="Nilai Tes Seni Budaya">
        </div>
        <div class="form-group">
            <label>Penghasilan orang tua</label><br>
            <input type="text" min="0" minlength="1" id="c5" name="c5" class="form-control" placeholder="Penghasilan Orang Tua">
        </div>
        <input type="submit" name="submit" class="btn btn-info btn-sm" value="Save">
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
