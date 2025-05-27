@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                   <div class="col">
					 <div class="card radius-10 border-start border-0 border-4 border-info">
						<a href="{{ route("admin.categories.index") }}">
							<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Total Kategori</p>
									<h4 class="my-1 text-info">{{ $numOfCategories }}</h4>
									<p class="mb-0 font-13">+2.5% Dari Minggu Lalu</p>
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bx-grid-alt'></i> 
								</div>
							</div>
						</div>
						</a>
					 </div>
				   </div>
				   <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-danger">
					  <a href="{{ route("admin.instructors.index") }}">
						 <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Insturctur</p>
								   <h4 class="my-1 text-danger">{{ $totalInstructor }}</h4>
								   <p class="mb-0 font-13">+5.4% Dari Minggu Lalu</p>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bxs-group'></i>
							   </div>
						   </div>
					   </div>
					  </a>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-success">
					 <a href="{{ route('admin.courses.index') }}">
						  <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Kelas</p>
								   <h4 class="my-1 text-success">{{ $numOfCourse }}</h4>
								   <p class="mb-0 font-13">-4.5% Dari Minggu Lalu</p>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
							   </div>
						   </div>
					   </div>
					 </a>
					</div>
				  </div>
				  <div class="col"> 
	<div class="card radius-10 border-start border-0 border-4 border-warning">
		<div class="card-body">
			<a href="{{ route('admin.students.index') }}" class="text-decoration-none text-dark">
				<div class="d-flex align-items-center">
					<div>
						<p class="mb-0 text-secondary">Total Siswa</p>
						<h4 class="my-1 text-warning">{{ $totalStudent }}</h4>
						<p class="mb-0 font-13 text-primary">+8.4% Dari Minggu Lalu</p>
					</div>
					<div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto">
						<i class='bx bxs-group'></i>
					</div>
				</div>
			</a>
		</div>
	</div>
</div>
</div><!--end row-->

				<div class="row"><!--end User Overview dan categori-->
        <div class="col-12 col-lg-8 d-flex">
        <div class="card radius-10 w-100">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Grafik Pengguna</h6>
								</div>
								
							</div>
						</div>
						  <div class="card-body">
							<div class="d-flex align-items-center ms-auto font-13 gap-2 mb-3">
								<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #14abef"></i>Enrollment</span>
								<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #ffc107"></i>User</span>
							</div>
							<div class="chart-container-1">
								<canvas id="chart1"></canvas>
							  </div>
						  </div>
						   @php
							$enrollments = $enrollmentsByMonth;
							$user = $userPerMonths
						   @endphp
						  <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">
							<div class="col">
							  <div class="p-3">
								<h5 class="mb-0">24.15M</h5>
								<small class="mb-0">Pengunjung Keseluruhan <span> <i class="bx bx-up-arrow-alt align-middle"></i> 2.43%</span></small>
							  </div>
							</div>
							<div class="col">
							  <div class="p-3">
								<h5 class="mb-0">12:38</h5>
								<small class="mb-0">Durasi Pengunjung<span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.65%</span></small>
							  </div>
							</div>
							<div class="col">
							  <div class="p-3">
								<h5 class="mb-0">639.82</h5>
								<small class="mb-0">Halaman/Kunjungi <span> <i class="bx bx-up-arrow-alt align-middle"></i> 5.62%</span></small>
							  </div>
							</div>
						  </div>
					  </div>
				   </div>
				   <div class="col-12 col-lg-4 d-flex">
                       <div class="card radius-10 w-100">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Kategori</h6>
								</div>
								
							</div>
						</div>
						   <div class="d-flex justify-content-center">
							<canvas id="chart2" style="max-width: 300px; max-height: 300px;"></canvas>
							</div>

						   @php
							$labels = $categoriesWithCount->pluck('name');
							$counts = $categoriesWithCount->pluck('courses_count');
						   @endphp
						   <ul class="list-group list-group-flush">
							@foreach ($categoriesWithCount as $category )
								<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">{{ $category->name }} <span class="badge bg-success rounded-pill">{{ $category->courses_count }}</span>
							</li>
							@endforeach	
						</ul>
					   </div>
				   </div>
				</div>
        
				<!--Daftar Kursus-->
				 <div class="card radius-10">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<div>
								<h6 class="mb-0">Daftar Kelas</h6>
							</div>
							
						</div>
					</div>
                         <div class="card-body">
						 <div class="table-responsive">
						   <table class="table align-middle mb-0">
							<thead class="table-light">
							 <tr>
							   <th>Nama</th>
							   <th>Thumbnail</th>
							   <th>Insturctur</th>
							   <th>Kategori</th>
							   <th>Level</th>
							   <th>Harga</th>
							 </tr>
							 </thead>
							 <tbody>
								 @forelse ($courses as $course)
								 <tr>
								  <td>{{ $course->title }}</td>
								  <td>
									@if ($course->youtube_thumbnail_url)
										<iframe width="120" height="80" src="{{ $course->youtube_thumbnail_url }}" 
											frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
											allowfullscreen>
										</iframe>
										
									@endif
								  </td>
								 
								  <td>{{ $course->instructor->name }}</td>
								  <td>{{ $course->category->name }}</td>
								  <td>{{ $course->level->name }}</td>
								  <td> {{ $course->price }}</td>
								 </tr>
								
							 @empty
								<tr>Belum ada kelas yang terdaftar</tr>
							 @endforelse
						    </tbody>
						  </table>
						  </div>
						 </div>
					</div>
					<!--end row-->

					<!--Daftar user-->
				 <div class="card radius-10">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<div>
								<h6 ssass="mb-0">Daftar User</h6>
							</div>
							
						</div>
					</div>
                         <div class="card-body">
						 <div class="table-responsive">
						   <table class="table align-middle mb-0">
							<thead class="table-light">
							 <tr>
							   <th>Nama</th>
							   <th>Email</th>
							   <th>Role</th>
							   <th>Tanggal</th>
							 </tr>
							 </thead>
							 
						  </table>
						  </div>
						 </div>
					</div>
					<!--end row-->

					<!--Pendapatan-->
					 <div class="row row-cols-1 row-cols-lg-3">
						
						 


						 
					 </div><!--end row-->
@endsection


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = @json($labels);
        const data = @json($counts);

        new Chart(document.getElementById("chart2"), {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Course',
                    data: data,
                    backgroundColor: [
                        '#4bc0c0', '#ff6384', '#ffcd56', '#36a2eb', '#9966ff', '#ff9f40'
                    ]
                }]
            },
			options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
            }
        }
    }
        });

		const enrollments = @json($enrollments);
		const users = @json($user);

		let enrollmentData = new Array(12).fill(0);
		let userData = new Array(12).fill(0);
		enrollments.forEach(item => {
			enrollmentData[item.month - 1] = item.count;
		});
		users.forEach(item => {
			userData[item.month - 1] = item.count;
		});

		console.log(userData);


		const chartData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label: 'Enrollment',
                    data: enrollmentData,
                    backgroundColor: '#3b82f6',
                    borderColor: '#3b82f6',
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                },
                {
                    label: "User",
                    data: userData,
                    backgroundColor: '#f59e0b',
                    borderColor: '#f59e0b',
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                }
            ]
        };

        // Chart configuration
        const config = {
            type: 'bar',
            data: chartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: 'rgba(255, 255, 255, 0.1)',
                        borderWidth: 1,
                        cornerRadius: 8,
                        displayColors: true,
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.parsed.y;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.05)',
                        },
                        ticks: {
                            font: {
                                size: 12,
                                family: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif'
                            },
                            color: '#6c757d'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        max: 90,
                        grid: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.05)',
                        },
                        ticks: {
                            stepSize: 10,
                            font: {
                                size: 12,
                                family: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif'
                            },
                            color: '#6c757d'
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                },
                elements: {
                    bar: {
                        borderWidth: 0,
                    }
                }
            }
        };

        // Initialize chart
        const ctx = document.getElementById('chart1').getContext('2d');
        const userOverviewChart = new Chart(ctx, config);

        // Add some interactivity to the menu dots
        document.querySelector('.menu-dots').addEventListener('click', function() {
            alert('Menu options would appear here in a real application');
        });
    </script>
@endpush

@section('styles')
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
@endsection 
