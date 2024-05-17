@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Admin</h1>

    <!-- Quick Stats -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Total Voters</h5>
                    <p>{{ $voters->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Total Candidates</h5>
                    <p>{{ $candidates->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Total Reports</h5>
                    <p>{{ $reports->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Ongoing Pemira</h5>
                    <p>{{ $all_pemira->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Information Management -->
    <div class="card mb-4">
        <div class="card-header">
            <h2>Manajemen Informasi</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Konten</th>
                        <th>Tanggal Publikasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($informations as $info)
                        <tr>
                            <td>{{ $info->title }}</td>
                            <td>{{ Str::limit($info->content, 50) }}</td>
                            <td>{{ $info->publish_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Report Management -->
    <div class="card mb-4">
        <div class="card-header">
            <h2>Manajemen Laporan</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Pelapor</th>
                        <th>Laporan</th>
                        <th>Tanggal Laporan</th>
                        <th>Status Laporan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                        <tr>
                            <td>{{ $report->user->name }}</td>
                            <td>{{ Str::limit($report->report, 50) }}</td>
                            <td>{{ $report->report_date }}</td>
                            <td>{{ $report->report_status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Candidate Monitoring -->
    <div class="card mb-4">
        <div class="card-header">
            <h2>Monitoring Kandidat</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Fakultas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($candidates as $candidate)
                        <tr>
                            <td>{{ $candidate->name }}</td>
                            <td>{{ $candidate->nim }}</td>
                            <td>{{ $candidate->faculty }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Voter Monitoring -->
    <div class="card mb-4">
        <div class="card-header">
            <h2>Monitoring Pemilih</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Fakultas</th>
                        <th>Status Pemilihan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($voters as $voter)
                        <tr>
                            <td>{{ $voter->name }}</td>
                            <td>{{ $voter->nim }}</td>
                            <td>{{ $voter->faculty }}</td>
                            <td>{{ $voter->vote_status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection