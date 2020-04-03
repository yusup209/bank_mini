@extends('layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1><a href="{{ route('dataKelas.index') }}"> <i class="fas fa-chevron-left"></i> Kembali</a></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item"><a href="#">Data Kelas</a></div>
            <div class="breadcrumb-item">Edit</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Kelas</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('dataKelas.update', $kelas->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                    <input type="text" name="nama_kelas" value="{{ $kelas->nama_kelas }}" class="form-control">
                    </div>
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    
</script>
@endsection