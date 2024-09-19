@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-3">Enrollment List</h1>
        <a href="{{ route('admin.enrollments.create') }}" class="btn btn-success">
            + Add New Enrollment
        </a>
    </div>


    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($enrollments->isEmpty())
        <p>No enrollments available.</p>
    @else

    <div class="card-body">
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped align-middle mb-0">
                <thead class="table-light">
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
                   
                    <form action="{{ route('admin.enrollments.destroy', $enrollment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="ti ti-trash"></i></button>
                    </form>
                </td>
            </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection

@section('styles')
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
@endsection
