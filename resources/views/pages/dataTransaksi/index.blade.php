@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Transaksi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Data Transaksi</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-sm btn-info"><i class="fas fa-print"></i> Buat Report Transaksi</button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hovered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Rek. Pengirim</th>
                            <th>Rek. Tujuan</th>
                            <th>Tipe Transaksi</th>
                            <th>Jumlah</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $x)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $x->account_sender->no_rek}}</td>
                            <td>{{ $x->account_receiver->no_rek}}</td>
                            <td>{{ $x->trx_type }}</td>
                            <td>{{ $x->jumlah }}</td>
                            <td>{{ $x->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


@endsection