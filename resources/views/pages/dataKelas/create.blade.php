@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1><a href="{{ route('dataKelas.index') }}"> <i class="fas fa-chevron-left"></i> Kembali</a></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item"><a href="#">Data Kelas</a></div>
            <div class="breadcrumb-item">Tambah</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Kelas</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('dataKelas.store') }}" method="post">
                    @csrf
                    
                    <div class="form-group">
                        <input type="text" name="nama_kelas" id="" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection