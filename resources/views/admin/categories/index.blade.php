@extends('admin.dashboard')

@section('title', 'Categories')

@section('content')
<div class="container">
    <h1 class="mb-5 fw-bold">Categories</h1>

     <!-- Menampilkan pesan sukses -->
     @if(session('success'))
     <div class="alert alert-success">
         {{ session('success') }}
     </div>
    @endif
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add New Category</a>

    <table id="dataTable" class="table mt-3 table-bordered table-striped" >
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Icon</th>
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
                {{-- <td>{{ $category->slug }}</td> --}}
                <td>
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('editstyles')
    <link href="{{ asset('assets/css/edit.css') }}" rel="stylesheet">
@endsection 