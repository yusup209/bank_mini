@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tabungan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Tabungan</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Saldo Tabungan</h4>
                    </div>
                    <div class="card-body">
                        <h2>Rp. {{ number_format($tabungan->saldo,2,',','.') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection