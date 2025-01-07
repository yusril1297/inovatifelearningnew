@extends('layouts.admin')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-6">
        <div class="d-flex justify-content-between align-items-center bg-white rounded-xl shadow-lg p-4 flex flex-col mb-1 ">
            <h1 class="mb-3" style="font-family: 'Oswald', sans-serif;">Level List</h1>

            <!-- Menampilkan pesan sukses -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <a href="{{ route('admin.categories.create') }}" class="btn btn-success">
                + Add New Level
            </a>
        </div>


        <div class="card-body bg-white rounded-xl shadow-lg p-4">
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped align-middle mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($levels as $level)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $level->name }}</td>
                                <td>
                                    <a href="{{ route('admin.levels.edit', $level->id) }}" class="btn btn-sm btn-warning"><i
                                            class="ti ti-pencil"></i></a>
                                    <form action="{{ route('admin.levels.destroy', $level->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')"><i class="ti ti-trash"></i></button>
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
