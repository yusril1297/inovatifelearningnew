@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Kelola Tingkatan</h1>
    <a href="{{ route('admin.levels.create') }}" class="btn btn-primary mb-3">Buat Tingkatan Baru</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card card-body ">
        <div class="table-responsive">
    <table id="dataTable" class="table table-striped align-middle mb-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($levels as $level)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $level->name }}</td>
                    <td>
                        <a href="{{ route('admin.levels.edit', $level->id) }}" class="btn btn-sm btn-warning"><i class="ti ti-pencil"></i></a>
                        <form action="{{ route('admin.levels.destroy', $level->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')"><i class="ti ti-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
</div>
@endsection
