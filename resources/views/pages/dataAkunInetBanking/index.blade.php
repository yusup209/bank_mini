@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Akun Internet Banking</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Data Akun Internet Banking</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('dataAkunInetBanking.create') }}" class="btn btn-sm btn-primary">Tambah Akun</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hovered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Nasabah</th>
                            <th>No. Rekening</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inetbanking as $x)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $x->nasabah->nama_lengkap }}</td>
                            <td>{{ $x->nasabah->no_rek }}</td>
                            <td>{{ $x->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


@endsection