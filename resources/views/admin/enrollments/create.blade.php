@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftarkan Siswa ke Kursus</h2>
    
    <!-- Form untuk mendaftarkan siswa ke kursus -->
    <form action="{{ route('admin.enrollments.store') }}" method="POST">
        @csrf

        <!-- Pilih Siswa -->
        <div class="form-group">
            <label for="user_id">Pilih Siswa:</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">-- Pilih Siswa --</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Pilih Kursus -->
        <div class="form-group">
            <label for="course_id">Pilih Kursus:</label>
            <select name="course_id" id="course_id" class="form-control" required>
                <option value="">-- Pilih Kursus --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary">Daftarkan Siswa</button>
    </form>
</div>
@endsection
