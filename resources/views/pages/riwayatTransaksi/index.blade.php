@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Riwayat Transaksi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Riwayat Transaksi</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('') }}" class="btn btn-sm btn-info"><i class="fas fa-print"></i> Cetak Riwayat Transaksi</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hovered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Dari</th>
                            <th>Tujuan</th>
                            <th>Nominal</th>
                            <th>Tipe Transaksi</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayat as $x)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $x->account_sender->nama_lengkap }}</td>
                            <td>{{ $x->account_receiver->nama_lengkap }}</td>
                            <td>Rp. {{ number_format($x->jumlah, 2,',','.') }}</td>
                            <td><span class="badge badge-primary">{{ $x->trx_type }}</span></td>
                            <td>{{ date_format($x->created_at, 'D, d M Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection