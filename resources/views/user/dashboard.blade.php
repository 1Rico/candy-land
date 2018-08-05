@extends ('layouts.user')

@section('title')
    Dashboard
@endsection

@section('page-css')
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('css/pages/dashboard2.css') }}" rel="stylesheet">
@endsection

@section ('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">My Dashboard</h4>
                    <h6 class="card-subtitle">You can use four different alert <code>info, warning, success, and error</code> message.</h6>

                </div>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Hi {{$user->firstname}}!</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard 2</li>
                        </ol>
                        <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Info box -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-7">
                    <div class="card fixed-height">
                        <div class="card-body">

                            <div class="table-responsive m-t-30">
                                <table class="table stylish-table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Design</th>
                                        <th>Tailor</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Expected</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($orders as $order)
                                    <tr>
                                        <td>
                                            <span class="round round-danger">N</span>
                                        </td>
                                        <td>
                                            <h6>{{$order->design->name ?? ''}}</h6>
                                            <small class="text-muted">{{ str_limit($order->design->description ?? 'No description', $limit = 16, $end = '...') }}</small>
                                        </td>
                                        <td>{{$order->design->tailor->firstname ?? ''}} {{$order->design->tailor->lastname ?? ''}}</td>
                                        <td>
                                            @php
                                                $status = $order->getOriginal('status');
                                                switch ($status){
                                                    case 3:
                                                        $class = 'label label-danger';
                                                    break;
                                                    case 2:
                                                        $class = 'label label-warning';
                                                    break;
                                                    case 1:
                                                        $class = 'label label-primary';
                                                    break;
                                                    case 0:
                                                        $class = 'label label-success';
                                                    break;
                                                    default:
                                                        $class = 'label label-info';
                                                    break;
                                                }
                                            @endphp
                                            <span class="{{$class}}">{{$order->status}}</span>
                                        </td>
                                        <td>{{$order->created_at->addDays($order->design->duration ? $order->design->duration : 0 )->format('l jS F, Y')}} </td>
                                        <td>{{$order->created_at->format('l jS F, Y') ?? ''}}</td>
                                    </tr>
                                        @empty
                                        <td colspan="6" style="text-align: center">No Orders Yet!</td>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-lg-5">
                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-6">
                            <div class="card bg-success text-white text-center">
                                <div class="card-body">
                                    <small>Visit</small>
                                    <h3>284</h3>
                                    <div id="sparkline11" class="m-t-10"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-6">
                            <div class="card bg-info text-white text-center">
                                <div class="card-body">
                                    <small>Page Views</small>
                                    <h3>8284</h3>
                                    <div id="sparkline12" class="m-t-10"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-6">
                            <div class="card bg-primary text-white text-center">
                                <div class="card-body">
                                    <small>Unique visitors</small>
                                    <h3>284</h3>
                                    <div id="sparkline13" class="m-t-10"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-6">
                            <div class="card bg-danger text-white text-center">
                                <div class="card-body">
                                    <small>Bounce Rate</small>
                                    <h3>28%</h3>
                                    <div id="sparkline14" class="m-t-10"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Today's Schedule</h5>
                                    <h6 class="card-subtitle">check out your daily schedule</h6>
                                    <div class="steamline m-t-40">
                                        <div class="sl-item">
                                            <div class="sl-left bg-success">
                                                <i class="ti-user"></i>
                                            </div>
                                            <div class="sl-right">
                                                <div class="font-medium">Meeting today
                                                    <span class="sl-date"> 5pm</span>
                                                </div>
                                                <div class="desc">you can write anything </div>
                                            </div>
                                        </div>

                                        <div class="sl-item">
                                            <div class="sl-left">
                                                <img class="img-circle" alt="user" src="../assets/images/users/1.jpg"> </div>
                                            <div class="sl-right">
                                                <div class="font-medium">John Doe
                                                    <span class="sl-date"> 5pm</span>
                                                </div>
                                                <div class="desc">Call today with gohn doe </div>
                                            </div>
                                        </div>
                                        <div class="sl-item">
                                            <div class="sl-left">
                                                <img class="img-circle" alt="user" src="../assets/images/users/2.jpg"> </div>
                                            <div class="sl-right">
                                                <div class="font-medium">Go to the Doctor
                                                    <span class="sl-date">5 minutes ago</span>
                                                </div>
                                                <div class="desc">Contrary to popular belief</div>
                                            </div>
                                        </div>
                                        <div class="sl-item">
                                            <div class="sl-left">
                                                <img class="img-circle" alt="user" src="../assets/images/users/3.jpg"> </div>
                                            <div class="sl-right">
                                                <div>
                                                    <a href="#">Tiger Sroff</a>
                                                    <span class="sl-date">5 minutes ago</span>
                                                </div>
                                                <div class="desc">Approve meeting with tiger
                                                    <br>
                                                    <a href="javascript:void(0)" class="btn m-t-10 m-r-5 btn-rounded btn-outline-success">Apporve</a>
                                                    <a href="javascript:void(0)" class="btn m-t-10 btn-rounded btn-outline-danger">Refuse</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- ============================================================== -->
            <!-- End Info box -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>

@endsection