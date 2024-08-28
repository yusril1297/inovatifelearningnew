@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Create Tag</h1>

    <form action="{{ route('admin.tags.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tag Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection