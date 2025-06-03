@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftarkan Siswa ke Kelas</h2>
    
    <!-- Form untuk mendaftarkan siswa ke kursus -->
    <form action="{{ route('admin.students.store') }}" method="POST">
    @csrf

    <!-- Nama -->
    <div class="form-group mt-3">
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name') }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Email -->
    <div class="form-group mt-3">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email') }}" required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Password -->
    <div class="form-group mt-3">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
               required>
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Tombol Submit -->
    <button type="submit" class="btn btn-primary mt-4">Daftarkan Instructor</button>
</form>

</div>
@endsection
