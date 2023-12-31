@extends('templates.admin.master')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->
    
        <section class="section dashboard">
            <div class="row">
                <div class="row col-lg-12">
                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
        
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
        
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
        
                        <div class="card-body">
                            <h5 class="card-title">Đơn hàng 
                                {{-- <span>| Tháng này</span> --}}
                            </h5>
        
                            <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>
                                    {{$countOrders}}
                                </h6>
                                <span class="text-success small pt-1 fw-bold">{{$countOrdersDone}}</span> 
                                <span class="text-muted small pt-2 ps-1">chưa xác nhận</span>
        
                            </div>
                            </div>
                        </div>
        
                        </div>
                    </div><!-- End Sales Card -->
        
                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
        
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
        
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
        
                        <div class="card-body">
                            <h5 class="card-title">Doanh thu 
                                {{-- <span>| This Month</span> --}}
                            </h5>
        
                            <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{number_format($countRevenue,0,",",".")}}đ</h6>
                                <span class="text-success small pt-1 fw-bold">{{number_format($countRevenueDone,0,",",".")}}đ</span> <span class="text-muted small pt-2 ps-1">thực tế</span>
        
                            </div>
                            </div>
                        </div>
        
                        </div>
                    </div><!-- End Revenue Card -->
        
                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-md-12">
        
                        <div class="card info-card customers-card">
        
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
        
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
        
                        <div class="card-body">
                            <h5 class="card-title">Tài khoản 
                                {{-- <span>| This Year</span> --}}
                            </h5>
        
                            <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{$countUsers}}</h6>
                                <span class="text-danger small pt-1 fw-bold">{{$countCustomer}}</span> <span class="text-muted small pt-2 ps-1">khách hàng</span>
        
                            </div>
                            </div>
        
                        </div>
                    </div>
        
                </div><!-- End Customers Card -->
            </div>
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">
        
                    
        
                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">
        
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
        
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
        
                        <div class="card-body">
                            <h5 class="card-title">Reports <span>/Today</span></h5>
        
                            <!-- Line Chart -->
                            <div id="reportsChart"></div>
        
                            <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#reportsChart"), {
                                series: [{
                                    name: 'Sales',
                                    data: [31, 40, 28, 51, 42, 82, 56],
                                }, {
                                    name: 'Revenue',
                                    data: [11, 32, 45, 32, 34, 52, 41]
                                }, {
                                    name: 'Customers',
                                    data: [15, 11, 32, 18, 9, 24, 11]
                                }],
                                chart: {
                                    height: 350,
                                    type: 'area',
                                    toolbar: {
                                    show: false
                                    },
                                },
                                markers: {
                                    size: 4
                                },
                                colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                fill: {
                                    type: "gradient",
                                    gradient: {
                                    shadeIntensity: 1,
                                    opacityFrom: 0.3,
                                    opacityTo: 0.4,
                                    stops: [0, 90, 100]
                                    }
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                stroke: {
                                    curve: 'smooth',
                                    width: 2
                                },
                                xaxis: {
                                    type: 'datetime',
                                    categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                                },
                                tooltip: {
                                    x: {
                                    format: 'dd/MM/yy HH:mm'
                                    },
                                }
                                }).render();
                            });
                            </script>
                            <!-- End Line Chart -->
        
                        </div>
        
                        </div>
                    </div><!-- End Reports -->
        
                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
        
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
        
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
        
                        <div class="card-body">
                            <h5 class="card-title">Đơn hàng mới nhất 
                                {{-- <span>| Today</span> --}}
                            </h5>
        
                            <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên khách hàng</th>
                                {{-- <th scope="col">Email</th> --}}
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Ngày mua</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <th scope="row"><a href="{{route('order.showOrderDetail', $order->idHD)}}">{{$order->idHD}}</a></th>
                                    <td>{{Str::limit($order->tenNguoiNhan, 30)}}</td>
                                    {{-- <td>{{$order->email}}</td> --}}
                                    <td>{{$order->soDienThoai}}</td>
                                    <td>{{$order->ngayMua}}</td>
                                    <td>{{number_format($order->tongTien,0,",",".")}}</td>
                                    <td><span class="badge 
                                        @if ($order->isDone==0) bg-secondary
                                        @elseif ($order->isDone==1) bg-info
                                        @elseif ($order->isDone==2) bg-success
                                        @elseif ($order->isDone==3) bg-danger
                                        @endif
                                    ">
                                        @if ($order->isDone==0) Chưa xác nhận
                                        @elseif ($order->isDone==1) Đã xác nhận
                                        @elseif ($order->isDone==2) Đã hoàn thành
                                        @elseif ($order->isDone==3) Đã hủy
                                        @endif
                                    </span></td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            </table>
        
                        </div>
        
                        </div>
                    </div><!-- End Recent Sales -->
        
                    <!-- Top Selling -->
                    <div class="col-12">
                        <div class="card top-selling overflow-auto">
        
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
        
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
        
                        <div class="card-body pb-0">
                            <h5 class="card-title">Sản phẩm bán chạy
                                {{-- <span>| Today</span> --}}
                            </h5>
        
                            <table class="table datatable table-borderless">
                            <thead align="center" valign="middle">
                                <tr>
                                <th scope="col">Hình</th>
                                <th scope="col" style="text-align: left">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng bán</th>
                                <th scope="col">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($spTopselling as $sp)
                                <tr align="center">
                                    
                                    <th scope="row"><a href="{{route('clientproduct-detail', $sp->slug)}}"><img src="{{$sp->urlHinh}}" alt=""></a></th>
                                    <td style="text-align: left">
                                        <a href="{{route('clientproduct-detail', $sp->slug)}}" class="text-primary">
                                            {{$sp->tenSP}}
                                        </a>
                                    </td>
                                    <td>{{number_format($sp->giaSP,0,",",".")}}</td>
                                    <td>{{$sp->soLuongBan}}</td>
                                    <td class="fw-bold">{{number_format($sp->giaSP*$sp->soLuongBan,0,",",".")}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
        
                        </div>
        
                        </div>
                    </div><!-- End Top Selling -->
        
                    </div>
                </div><!-- End Left side columns -->
        
                <!-- Right side columns -->
                <div class="col-lg-4">
        
                    {{-- <!-- Recent Activity -->
                    <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>
        
                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
        
                    <div class="card-body">
                        <h5 class="card-title">Recent Activity <span>| Today</span></h5>
        
                        <div class="activity">
        
                        <div class="activity-item d-flex">
                            <div class="activite-label">32 min</div>
                            <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                            <div class="activity-content">
                            Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                            </div>
                        </div><!-- End activity item-->
        
                        <div class="activity-item d-flex">
                            <div class="activite-label">56 min</div>
                            <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                            <div class="activity-content">
                            Voluptatem blanditiis blanditiis eveniet
                            </div>
                        </div><!-- End activity item-->
        
                        <div class="activity-item d-flex">
                            <div class="activite-label">2 hrs</div>
                            <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                            <div class="activity-content">
                            Voluptates corrupti molestias voluptatem
                            </div>
                        </div><!-- End activity item-->
        
                        <div class="activity-item d-flex">
                            <div class="activite-label">1 day</div>
                            <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                            <div class="activity-content">
                            Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                            </div>
                        </div><!-- End activity item-->
        
                        <div class="activity-item d-flex">
                            <div class="activite-label">2 days</div>
                            <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                            <div class="activity-content">
                            Est sit eum reiciendis exercitationem
                            </div>
                        </div><!-- End activity item-->
        
                        <div class="activity-item d-flex">
                            <div class="activite-label">4 weeks</div>
                            <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                            <div class="activity-content">
                            Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                            </div>
                        </div><!-- End activity item-->
        
                        </div>
        
                    </div>
                    </div><!-- End Recent Activity -->
        
                    <!-- Budget Report -->
                    <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>
        
                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
        
                    <div class="card-body pb-0">
                        <h5 class="card-title">Budget Report <span>| This Month</span></h5>
        
                        <div id="budgetChart" style="min-height: 400px;" class="echart"></div>
        
                        <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                            legend: {
                                data: ['Allocated Budget', 'Actual Spending']
                            },
                            radar: {
                                // shape: 'circle',
                                indicator: [{
                                    name: 'Sales',
                                    max: 6500
                                },
                                {
                                    name: 'Administration',
                                    max: 16000
                                },
                                {
                                    name: 'Information Technology',
                                    max: 30000
                                },
                                {
                                    name: 'Customer Support',
                                    max: 38000
                                },
                                {
                                    name: 'Development',
                                    max: 52000
                                },
                                {
                                    name: 'Marketing',
                                    max: 25000
                                }
                                ]
                            },
                            series: [{
                                name: 'Budget vs spending',
                                type: 'radar',
                                data: [{
                                    value: [4200, 3000, 20000, 35000, 50000, 18000],
                                    name: 'Allocated Budget'
                                },
                                {
                                    value: [5000, 14000, 28000, 26000, 42000, 21000],
                                    name: 'Actual Spending'
                                }
                                ]
                            }]
                            });
                        });
                        </script>
        
                    </div>
                    </div><!-- End Budget Report --> --}}
        
                    <!-- Loai SP -->
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
            
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
        
                        <div class="card-body pb-0">
                            <h5 class="card-title">Loại sản phẩm <span>| Today</span></h5>
                        
                            <div id="LoaispChart" style="min-height: 400px;" class="echart"></div>
            
                        </div>
                    </div><!-- End Loai SP -->

                    <!-- Thuong hieu SP -->
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
            
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
        
                        <div class="card-body pb-0">
                            <h5 class="card-title">Thương hiệu sản phẩm <span>| Today</span></h5>
                        
                            <div id="ThuonghieuspChart" style="min-height: 400px;" class="echart"></div>
            
                        </div>
                    </div><!-- End Thuong hieu SP -->
        
                    <!-- News & Updates Traffic -->
                    <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>
        
                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
        
                    <div class="card-body pb-0">
                        <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>
        
                        <div class="news">
                        <div class="post-item clearfix">
                            <img src="assets/img/news-1.jpg" alt="">
                            <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                            <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                        </div>
        
                        <div class="post-item clearfix">
                            <img src="assets/img/news-2.jpg" alt="">
                            <h4><a href="#">Quidem autem et impedit</a></h4>
                            <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
                        </div>
        
                        <div class="post-item clearfix">
                            <img src="assets/img/news-3.jpg" alt="">
                            <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                            <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>
                        </div>
        
                        <div class="post-item clearfix">
                            <img src="assets/img/news-4.jpg" alt="">
                            <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                            <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>
                        </div>
        
                        <div class="post-item clearfix">
                            <img src="assets/img/news-5.jpg" alt="">
                            <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                            <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos eius...</p>
                        </div>
        
                        </div><!-- End sidebar recent posts-->
        
                    </div>
                    </div><!-- End News & Updates -->
        
                </div><!-- End Right side columns -->
    
            </div>
        </section>
    
    </main><!-- End #main -->
@endsection

@section('customJs')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        echarts.init(document.querySelector("#LoaispChart")).setOption({
        tooltip: {
            trigger: 'item'
        },
        legend: {
            top: '5%',
            left: 'center'
        },
        series: [{
            name: 'Tên loại',
            type: 'pie',
            radius: ['40%', '70%'],
            avoidLabelOverlap: false,
            label: {
            show: false,
            position: 'center'
            },
            emphasis: {
            label: {
                show: true,
                fontSize: '18',
                fontWeight: 'bold'
            }
            },
            labelLine: {
            show: false
            },
            data: [
                <?php 
                    foreach ($spPerCategory as $spLoai) { ?>
                        {
                            value: <?= $spLoai->spMoiLoai ?>,
                            name: '<?= $spLoai->tenLoai ?>',
                        },
                <?php    } ?>
            ]
        }]
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        echarts.init(document.querySelector("#ThuonghieuspChart")).setOption({
        tooltip: {
            trigger: 'item'
        },
        legend: {
            top: '5%',
            left: 'center'
        },
        series: [{
            name: 'Tên thương hiệu',
            type: 'pie',
            radius: ['40%', '70%'],
            avoidLabelOverlap: false,
            label: {
            show: false,
            position: 'center'
            },
            emphasis: {
            label: {
                show: true,
                fontSize: '18',
                fontWeight: 'bold'
            }
            },
            labelLine: {
            show: false
            },
            data: [
                <?php 
                    foreach ($spPerBrand as $spTH) { ?>
                        {
                            value: <?= $spTH->spMoiTH ?>,
                            name: '<?= $spTH->tenTH ?>',
                        },
                <?php    } ?>
            ]
        }]
        });
    });
</script>

@endsection