@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1><a href="{{ route('dataAkun.index') }}"> <i class="fas fa-chevron-left"></i> Kembali</a></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item"><a href="#">Data Akun</a></div>
            <div class="breadcrumb-item">Update</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Update Akun</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('dataAkun.update', $akun->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="" class="form-control" value="{{ $akun->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" class="form-control" value="{{ $akun->email }}">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control" value="{{ $akun->password }}">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control select2">
                            @if($akun->status == "teller")
                                <option value="teller" selected>Teller</option>
                            @else
                                <option value="teller">Teller</option>
                            @endif
                            @if($akun->status == "superadmin")
                                <option value="superadmin" selected>Super Admin</option>
                            @else
                                <option value="superadmin">Super Admin</option>
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection