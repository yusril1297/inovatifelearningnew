@extends('layouts.admin')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-6">
        <div class="d-flex justify-content-between align-items-center bg-white rounded-xl shadow-lg p-4 flex flex-col mb-1 ">
            <h1 class="mb-3" style="font-family: 'Oswald', sans-serif;">Daftar Tag</h1>
            <!-- Menampilkan pesan sukses -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <a href="{{ route('admin.tags.create') }}" class="btn btn-success">
                + Tambah Tag Baru
            </a>
        </div>

        <div class="card-body bg-white rounded-xl shadow-lg p-4">
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped align-middle mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>
                                    <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">Hapus</button>
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
