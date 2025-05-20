@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                   <div class="col">
					 <div class="card radius-10 border-start border-0 border-4 border-info">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Total Orders</p>
									<h4 class="my-1 text-info">{{ $numOfOrders }}</h4>
									<p class="mb-0 font-13">+2.5% from last week</p>
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bxs-cart'></i>
								</div>
							</div>
						</div>
					 </div>
				   </div>
				   <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-danger">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Insturctur</p>
								   <h4 class="my-1 text-danger">{{ $totalRevenue }}</h4>
								   <p class="mb-0 font-13">+5.4% from last week</p>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bxs-wallet'></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-success">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Class</p>
								   <h4 class="my-1 text-success">{{ $numOfCourse }}</h4>
								   <p class="mb-0 font-13">-4.5% from last week</p>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-warning">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Student</p>
								   <h4 class="my-1 text-warning">{{ $totalUser }}</h4>
								   <p class="mb-0 font-13">+8.4% from last week</p>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bxs-group'></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div> 
				</div><!--end row-->

				<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sales Overview</title>
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f8f9fa;
      margin: 0;
      padding: 2rem;
    }
    .card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
      overflow: hidden;
    }
    .card-header {
      padding: 1rem 1.5rem;
      border-bottom: 1px solid #eee;
    }
    .card-body {
      padding: 1.5rem;
    }
    .chart-container-1 {
      height: 300px;
    }
    .row {
      display: flex;
      flex-wrap: wrap;
      margin: -0.5rem;
    }
    .col {
      flex: 1;
      padding: 0.5rem;
      text-align: center;
      border-top: 1px solid #eee;
    }
    .border {
      border: 1px solid #ddd;
    }
    .cursor-pointer {
      cursor: pointer;
    }
    .gap-2 {
      gap: 0.5rem;
    }
    .font-13 {
      font-size: 13px;
    }
    .d-flex {
      display: flex;
    }
    .align-items-center {
      align-items: center;
    }
    .ms-auto {
      margin-left: auto;
    }
    .mb-0 {
      margin-bottom: 0;
    }
    .mb-3 {
      margin-bottom: 1rem;
    }
    .p-3 {
      padding: 1rem;
    }
  </style>
</head>
<body>

<!-- Sales Overview -->
<div class="row">
  <div class="col-12 col-lg-8 d-flex">
    <div class="card radius-10 w-100">
      <div class="card-header">
        <div class="d-flex align-items-center">
          <div>
            <h6 class="mb-0">Sales Overview</h6>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex align-items-center ms-auto font-13 gap-2 mb-3">
          <span class="border px-1 rounded cursor-pointer">
            <i class="bx bxs-circle me-1" style="color: #14abef"></i>Sales
          </span>
          <span class="border px-1 rounded cursor-pointer">
            <i class="bx bxs-circle me-1" style="color: #ffc107"></i>Visits
          </span>
        </div>
        <div class="chart-container-1">
          <canvas id="chart1"></canvas>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">
        <div class="col">
          <div class="p-3">
            <h5 class="mb-0">24.15M</h5>
            <small class="mb-0">Overall Visitor <span><i class="bx bx-up-arrow-alt align-middle"></i> 2.43%</span></small>
          </div>
        </div>
        <div class="col">
          <div class="p-3">
            <h5 class="mb-0">12:38</h5>
            <small class="mb-0">Visitor Duration <span><i class="bx bx-up-arrow-alt align-middle"></i> 12.65%</span></small>
          </div>
        </div>
        <div class="col">
          <div class="p-3">
            <h5 class="mb-0">639.82</h5>
            <small class="mb-0">Pages/Visit <span><i class="bx bx-up-arrow-alt align-middle"></i> 5.62%</span></small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart Configuration -->
<script>
  const ctx = document.getElementById('chart1').getContext('2d');

  const chart1 = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
      datasets: [
        {
          label: 'Sales',
          data: [120, 190, 300, 250, 220, 270, 320],
          borderColor: '#14abef',
          backgroundColor: 'rgba(20, 171, 239, 0.1)',
          tension: 0.4,
          fill: true
        },
        {
          label: 'Visits',
          data: [400, 420, 460, 410, 390, 430, 480],
          borderColor: '#ffc107',
          backgroundColor: 'rgba(255, 193, 7, 0.1)',
          tension: 0.4,
          fill: true
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            color: '#666'
          }
        },
        x: {
          ticks: {
            color: '#666'
          }
        }
      }
    }
  });
</script>

</body>
</html>


				   <div class="col-12 col-lg-4 d-flex">
					<div class="card radius-10 w-100">
						<div class="card-header">
						<div class="d-flex align-items-center">
							<div>
							<h6 class="mb-0">Categories</h6>
							</div>
						</div>
						</div>
						<div class="card-body">
						<div class="chart-container-2" style="height:300px; position: relative;">
							<canvas id="chart2"></canvas>
						</div>
						</div>
						<ul class="list-group list-group-flush">
						<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
							Mobile Development <span class="badge bg-success rounded-pill">25</span>
						</li>
						<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
							Design <span class="badge bg-danger rounded-pill">10</span>
						</li>
						<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
							UI/UX <span class="badge bg-primary rounded-pill">65</span>
						</li>
						<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
							Photography <span class="badge bg-warning text-dark rounded-pill">14</span>
						</li>
						</ul>
					</div>
					

							<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
							<script>
							const ctx2 = document.getElementById('chart2').getContext('2d');
							const chart2 = new Chart(ctx2, {
								type: 'pie',
								data: {
								labels: ['Mobile Development', 'Design', 'UI/UX', 'Photography'],
								datasets: [{
									data: [25, 10, 65, 14],
									backgroundColor: [
									'#198754', // green
									'#dc3545', // red
									'#0d6efd', // blue
									'#ffc107'  // yellow
									],
									hoverOffset: 30,
								}]
								},
								options: {
								responsive: true,
								plugins: {
									legend: {
									position: 'bottom',
									labels: {
										boxWidth: 12,
										padding: 15,
									}
									}
								}
								}
							});
							</script>

				</div><!--end row-->

				<!--Daftar Kursus-->
				 <div class="card radius-10">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<div>
								<h6 class="mb-0">Daftar Kursus</h6>
							</div>
							
						</div>
					</div>
                         <div class="card-body">
						 <div class="table-responsive">
						   <table class="table align-middle mb-0">
							<thead class="table-light">
							 <tr>
							   <th>Title</th>
							   <th>Thumbnail</th>
							   <th>Insturctur</th>
							   <th>Category</th>
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
							   <th>Title</th>
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
						
						 <div class="col d-flex">
                           <div class="card radius-10 w-100">
							   <div class="card-body">
								<p class="font-weight-bold mb-1 text-secondary">Pendapatan</p>
								<div class="d-flex align-items-center mb-4">
									<div>
										<h4 class="mb-0">$89,540</h4>
									</div>
									<div class="">
										<p class="mb-0 align-self-center font-weight-bold text-success ms-2">4.4% <i class="bx bxs-up-arrow-alt mr-2"></i>
										</p>
									</div>
								</div>
								<div class="chart-container-0 mt-5">
									<canvas id="chart3"></canvas>
								  </div>
							   </div>
						   </div>
						 </div>


						 <div class="col d-flex">
							<div class="card radius-10 w-100">
								<div class="card-header bg-transparent">
									<div class="d-flex align-items-center">
										<div>
											<h6 class="mb-0">Top Pencarian</h6>
										</div>
									
									</div>
								</div>
								<div class="card-body">
									<div class="chart-container-1 mt-3">
										<canvas id="chart4"></canvas>
									  </div>
								</div>
								<ul class="list-group list-group-flush">
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">Completed <span class="badge bg-gradient-quepal rounded-pill">25</span>
									</li>
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Pending <span class="badge bg-gradient-ibiza rounded-pill">10</span>
									</li>
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Process <span class="badge bg-gradient-deepblue rounded-pill">65</span>
									</li>
								</ul>
							</div>
						  </div>
						  <div class="col d-flex">
							<div class="card radius-10 w-100">
								 <div class="card-header bg-transparent">
									<div class="d-flex align-items-center">
										<div>
											<h6 class="mb-0">Penjualan Kelas</h6>
										</div>
										
									 </div>
								 </div>
								<div class="card-body">
								   <div class="chart-container-0">
									 <canvas id="chart5"></canvas>
								   </div>
								</div>
								<div class="row row-group border-top g-0">
									<div class="col">
										<div class="p-3 text-center">
											<h4 class="mb-0 text-danger">$45,216</h4>
											<p class="mb-0">Clothing</p>
										</div>
									</div>
									<div class="col">
										<div class="p-3 text-center">
											<h4 class="mb-0 text-success">$68,154</h4>
											<p class="mb-0">Electronic</p>
										</div>
									 </div>
								</div><!--end row-->
							</div>
						  </div>
					 </div><!--end row-->
@endsection



@section('styles')
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
@endsection 
