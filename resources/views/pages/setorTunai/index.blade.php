@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Setor Tunai</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Setor Tunai</div>
        </div>
    </div>

    <div class="section-body">
        @if(Session('success'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                {{Session('success')}}
            </div>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Setor tunai</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('setorTunai.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Pilih Rekening</label>
                        <select name="id_nasabah" id="" class="select2 form-control">
                            @foreach($rekening as $x)
                                <option value="{{ $x->id }}">{{ $x->no_rek }} - {{ $x->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Setor</label>
                        <input type="number" class="form-control" name="jumlah">
                    </div>
                    <button type="submit" class="btn btn-primary">Setor</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection