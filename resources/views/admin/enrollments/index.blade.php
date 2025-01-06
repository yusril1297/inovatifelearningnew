@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-6">
    <div class="d-flex justify-content-between align-items-center bg-white rounded-xl shadow-lg p-4 flex flex-col mb-1">
        <h1 class="mb-3" style="font-family: 'Oswald', sans-serif;">Daftar Pendaftaran</h1>
        <a href="{{ route('admin.enrollments.create') }}" class="btn btn-success">
            + Tambah Pendaftaran Baru
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($enrollments->isEmpty())
        <p>Tidak ada pendaftaran tersedia.</p>
    @else

    <div class="card-body bg-white rounded-xl shadow-lg p-4" >
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped align-middle mb-0">
                <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Nama Siswa</th>
                <th>Kursus</th>
                <th>Metode Pembayaran</th>
                <th>Jumlah Pembayaran</th>
                <th>Tanggal Pendaftaran</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrollments as $enrollment)
            <tr>
                <td>{{ $loop->iteration }}</td> <!-- Nomor urut -->
                <td>{{ $enrollment->user->name }}</td> <!-- Nama siswa -->
                <td>{{ $enrollment->course->title }}</td> <!-- Nama kursus -->
                <td>{{ $enrollment->payment_method ?? 'N/A' }}</td> <!-- Metode pembayaran -->
                <td>{{ $enrollment->payable_amount ? 'Rp'.number_format($enrollment->payable_amount, 2) : 'Gratis' }}</td> <!-- Jumlah pembayaran -->
                <td>{{ $enrollment->enrollment_date->format('d M Y') }}</td> <!-- Tanggal pendaftaran -->
                <td>
                    @if($enrollment->status == 'pending')
                        <span class="badge bg-warning">Tertunda</span>
                    @elseif($enrollment->status == 'active')
                        <span class="badge bg-success">Aktif</span>
                    @else
                        <span class="badge bg-danger">Dibatalkan</span>
                    @endif
                </td>
                <td>
                    <form action="{{ route('admin.enrollments.destroy', $enrollment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')"><i class="ti ti-trash"></i></button>
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
