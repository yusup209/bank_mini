@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Pembayaran</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Pembayaran</div>
        </div>
    </div>

    <div class="section-body">
        @if(Session('success'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                {{Session('success')}}
            </div>
        </div>
        @elseif(Session('failed'))
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                {{Session('failed')}}
            </div>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Pembayaran</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('pembayaran.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Anda ingin bayar apa?</label>
                        <select name="" id="" class="select2 form-control">
                            <option value="kas">Kas Kelas</option>
                        </select>
                    </div>
                    <input type="hidden" name="id_rekening" value="{{ $rekening[0]->no_rek }}">
                    {{--<div class="form-group">
                        <label for="">Pilih Rekening</label>
                        <select name="id_rekening" id="" class="select2 form-control">
                            @foreach($rekening as $x)
                                <option value="{{ $x->id }}">{{ $x->no_rek }} - {{ $x->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>--}}
                    <div class="form-group">
                        <label for="">Nominal Pembayaran</label>
                        <input type="number" class="form-control" name="jumlah">
                    </div>
                    <button type="submit" class="btn btn-primary">Bayar</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection