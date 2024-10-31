@extends('admin.dashboard')

@section('title', 'Categories')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-6">
    <div class="d-flex justify-content-between align-items-center bg-white rounded-xl shadow-lg p-4 flex flex-col mb-1 ">
        <h1 class="mb-3" style="font-family: 'Oswald', sans-serif;">Category List</h1>

     <!-- Menampilkan pesan sukses -->
        @if(session('success'))
        <div class="alert alert-success">
         {{ session('success') }}
        </div>
        @endif
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success">
            + Add New Category
        </a>
    </div>

    @if($categories->isEmpty())
    <p>No categories available.</p>
    @endif    

    <div class="card-body bg-white rounded-xl shadow-lg p-4">
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped align-middle mb-0" >
                <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Icon</th>
                <th>Total Course</th>
                <th>Action</th>
            </tr>
                </thead>
            <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    @if ($category->icon)
                    <img src="{{ asset('storage/' . $category->icon) }}" alt="{{ $category->name }}" style="width: 50px; height: 50px;">
                   
                    
                    @else
                        <span>No Icon</span>
                    @endif
                </td>
                <td>{{ $category->courses_count }}</td>
                {{-- <td>{{ $category->slug }}</td> --}}
                <td>
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning"><i class="ti ti-pencil"></i></a>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></button>
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



@section('styles')
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
@endsection 
