@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftarkan Siswa ke Kelas</h2>
    
    <!-- Form untuk mendaftarkan siswa ke kursus -->
    <form action="{{ route('admin.enrollments.store') }}" method="POST">
        @csrf

        <!-- Pilih Siswa -->
        <div class="form-group">
    <label for="user_id">Masukan Email</label>
    <div>
        @foreach($students as $student)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="user_id" id="student_{{ $student->id }}" value="{{ $student->id }}" required>
                <label class="form-check-label" for="student_{{ $student->id }}">
                    {{ $student->name }}
                </label>
            </div>
        @endforeach
    </div>
</div>


        <!-- Pilih Kursus -->
        <div class="form-group">
            <label for="course_id">Masukan Password</label>
            <select name="course_id" id="course_id" class="form-control" required>
                <option value="">-- Pilih Kursus --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary">Daftarkan Instructor</button>
    </form>
</div>
@endsection
