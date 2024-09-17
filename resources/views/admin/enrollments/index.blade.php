@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Enrollments</h1>

    <div class="mb-3 d-flex justify-content-between align-items-center">
        <a href="{{ route('admin.enrollments.create') }}" class="btn btn-success">+ Add Students To Course</a>
      
    </div>


    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($enrollments->isEmpty())
        <p>No enrollments available.</p>
    @else

    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Course</th>
                <th>Payment Method</th>
                <th>Payment Amount</th>
                <th>Enrollment Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrollments as $enrollment)
            <tr>
                <td>{{ $loop->iteration }}</td> <!-- Nomor urut -->
                <td>{{ $enrollment->user->name }}</td> <!-- Nama siswa -->
                <td>{{ $enrollment->course->title }}</td> <!-- Nama kursus -->
                <td>{{ $enrollment->payment_method ?? 'N/A' }}</td> <!-- Metode pembayaran -->
                <td>{{ $enrollment->payable_amount ? '$'.number_format($enrollment->payable_amount, 2) : 'Free' }}</td> <!-- Jumlah pembayaran -->
                <td>{{ $enrollment->enrollment_date->format('d M Y') }}</td> <!-- Tanggal enrollment -->
                <td>
                    @if($enrollment->status == 'pending')
                        <span class="badge bg-warning">Pending</span>
                    @elseif($enrollment->status == 'active')
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Canceled</span>
                    @endif
                </td>
                <td>
                    <!-- Aksi seperti melihat detail, menghapus, atau mengubah status -->
                    <a href="{{ route('admin.enrollments.show', $enrollment->id) }}" class="btn btn-info btn-sm">View</a>
                    <form action="{{ route('admin.enrollments.destroy', $enrollment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
</div>
@endsection
