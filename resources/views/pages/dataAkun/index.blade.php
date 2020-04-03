@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Akun</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Data Akun</div>
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
                <a href="{{ route('dataAkun.create') }}" class="btn btn-sm btn-primary">Tambah Akun</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hovered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($akun as $x)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $x->nama }}</td>
                            <td>{{ $x->email }}</td>
                            <td>
                                <span class="badge badge-info">
                                    {{ $x->status }}
                                </span>
                            </td>
                            <td class="d-flex align-items-center">
                                <a href="{{ route('dataAkun.edit', $x->id) }}" class="btn btn-sm btn-success">Edit</a>
                                <form action="{{ route('dataAkun.destroy', $x->id) }}" method="post" class="ml-1">
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