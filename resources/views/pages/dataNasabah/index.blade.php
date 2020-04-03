@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Nasabah</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Data Nasabah</div>
        </div>
    </div>

    <div class="section-body">
        @if(Session('success'))
        <div class="alert alert-success alert-dismissible show fade mb-3">
            <div class="alert-body">
                <button class="close text-white" data-dismiss="alert"><span>&times;</span></button>
                <i class="far fa-lightbulb"></i> {{ Session('success') }}
            </div>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hovered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Rekening</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>Umur</th>
                            <th>No. Telp</th>
                            <th>Alamat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nasabah as $x)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $x->no_rek }}</td>
                            <td>{{ $x->nama_lengkap }}</td>
                            <td>{{ $x->jenis_kelamin }}</td>
                            <td>{{ $x->kelas->nama_kelas }}</td>
                            <td>{{ $x->umur }}</td>
                            <td>{{ $x->no_telp }}</td>
                            <td>{{ substr($x->alamat,0,20) }}...</td>

                            <td class="d-flex align-items-center">
                                <a href="{{ route('dataNasabah.edit', $x->id) }}" class="btn btn-sm btn-success">Edit</a>
                            <form action="{{ route('dataNasabah.destroy', $x->id) }}" method="post" class="ml-1">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


@endsection