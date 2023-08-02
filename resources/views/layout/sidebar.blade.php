<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div>
            <img src="{{asset('/template/frontend/images/logo.png')}}" alt="image" height="42" width="42"></i>
        </div>
        <div class=" sidebar-brand-text mx-3" style="font-size: large;">UM BANJARMASIN
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/beranda">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @if (auth()->user()->level=="admin")
    <li class="nav-item">
        <a class="nav-link" href="/datacalonmhs">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Calon Mahasiswa</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/datacrips">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Data Crips Kriteria</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/Perhitungan/SAW">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Perhitungan SAW</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/kuotakip">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Kuota KIP Prodi</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/datapengajuan">
            <i class="fas fa-fw fa-file"></i>
            <span>Data Pengajuan</span></a>
    </li>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('daftarulang/admin')}}">
            <i class="fas fa-fw fa-file"></i>
            <span>Data Daftar Ulang</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('rekap-laporan')}}" target="_blank">
            <i class="fas fa-fw fa-file"></i>
            <span>Cetak Rekap</span></a>
    </li>
    @endif
    
    @if(auth()->user()->level=="user")
    <li class="nav-item">
        <a class="nav-link" href="/biodatacalonmhs">
            <i class="fas fa-fw fa-user"></i>
            <span>Biodata</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/kriteria">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Pilih Prodi dan Kriteria</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('saw')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Hasil Rekomendasi</span></a>
    </li>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('cetaklaporan')}}" target="_blank">
            <i class="fas fa-fw fa-file"></i>
            <span>Cetak Laporan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('daftarulang')}}">
            <i class="fas fa-fw fa-file"></i>
            <span>Daftar Ulang</span></a>
    </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>