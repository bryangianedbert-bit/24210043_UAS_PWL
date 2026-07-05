@extends('layouts.app')

@section('title', 'Dashboard - SIAKAD')

@section('content')

<div class="dashboard-header">

    <div class="dashboard-header-left">

        <span class="dashboard-badge">
            <i class="bi bi-mortarboard-fill"></i>
            Sistem Informasi Akademik
        </span>

        <h2>
            Selamat Datang,
            <span>{{ Auth::user()->name ?? 'Administrator' }}</span>
        </h2>

        <p>
            Kelola seluruh data akademik kampus melalui dashboard dengan
            lebih mudah, cepat, dan terorganisir.
        </p>

    </div>

    <div class="dashboard-header-right">

        <div class="dashboard-circle">
            <i class="bi bi-person-workspace"></i>
        </div>

    </div>

</div>



<div class="row g-4 mt-1">

    <div class="col-lg-4">

        <div class="dashboard-card">

            <div class="dashboard-card-top">

                <div>

                    <small>Total Mahasiswa</small>

                    <h3>Mahasiswa</h3>

                </div>

                <div class="dashboard-icon blue">
                    <i class="bi bi-people-fill"></i>
                </div>

            </div>

            <p>
                Kelola seluruh data mahasiswa yang terdaftar pada sistem.
            </p>

            <a href="{{ route('mahasiswa.index') }}">
                Kelola Data
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>

    </div>





    <div class="col-lg-4">

        <div class="dashboard-card">

            <div class="dashboard-card-top">

                <div>

                    <small>Data Dosen</small>

                    <h3>Dosen</h3>

                </div>

                <div class="dashboard-icon blue">
                    <i class="bi bi-person-badge-fill"></i>
                </div>

            </div>

            <p>
                Kelola informasi dosen beserta data akademiknya.
            </p>

            <a href="{{ route('dosen.index') }}">
                Kelola Data
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>

    </div>





    <div class="col-lg-4">

        <div class="dashboard-card">

            <div class="dashboard-card-top">

                <div>

                    <small>Transaksi KRS</small>

                    <h3>KRS</h3>

                </div>

                <div class="dashboard-icon blue">
                    <i class="bi bi-file-earmark-text-fill"></i>
                </div>

            </div>

            <p>
                Cetak dan lihat seluruh transaksi Kartu Rencana Studi.
            </p>

            <a href="{{ route('krs.index') }}">
                Lihat KRS
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>

    </div>

</div>

@endsection