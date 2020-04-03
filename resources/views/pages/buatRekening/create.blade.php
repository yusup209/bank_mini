@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Buat Rekening Baru</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Buat Rekening Baru</div>
        </div>
    </div>

    <div class="section-body">
        @if(Session('success'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                {{ Session('success') }}
            </div>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Data Diri</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('buatRekening.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">No. Rekening</label>
                        <input type="text" name="no_rek" id="" class="form-control" value="{{ rand(1111111111,9999999999) }}">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Induk Siswa</label>
                        <input type="text" name="nis" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <select name="id_kelas" id="" class="form-control select2">
                            @foreach($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="" class="form-control">
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Umur</label>
                        <input type="number" name="umur" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">No. Telepon</label>
                        <input type="text" class="form-control" name="no_telp">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Buat Rekening Baru</button>

                </form>
            </div>
        </div>
    </div>
</section>

@endsection