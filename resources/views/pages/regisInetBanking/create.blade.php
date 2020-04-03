@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Registrasi Internet Banking</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Registrasi Internet Banking</div>
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
            <div class="card-body">
                <form action="{{ route('regisInetBanking.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Pilih Nasabah</label>
                        <select name="id_nasabah" id="" class="form-control select2">
                            @foreach($nasabah as $x)
                                <option value="{{ $x->id }}">{{ $x->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Buat</button>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection