@extends ('layouts.user')

@section('title')
    Dashboard
@endsection

@section('page-css')
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('css/pages/dashboard2.css') }}" rel="stylesheet">
@endsection

@section ('content')
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
                    <h4 class="text-themecolor">Dashboard 2</h4>
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
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Projects of the Month</h4>
                                <select class="custom-select w-25 ml-auto">
                                    <option selected="">January</option>
                                    <option value="1">February</option>
                                    <option value="2">March</option>
                                    <option value="3">April</option>
                                </select>
                            </div>
                            <div class="table-responsive m-t-30">
                                <table class="table stylish-table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Assigned</th>
                                        <th>Name</th>
                                        <th>Priority</th>
                                        <th>Budget</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td style="width:50px;">
                                            <span class="round">S</span>
                                        </td>
                                        <td>
                                            <h6>Sunil Joshi</h6>
                                            <small class="text-muted">Web Designer</small>
                                        </td>
                                        <td>Elite Admin</td>
                                        <td>
                                            <span class="label label-success">Low</span>
                                        </td>
                                        <td>$3.9K</td>
                                    </tr>
                                    <tr class="active">
                                        <td>
                                                    <span class="round">
                                                        <img src="../assets/images/users/2.jpg" alt="user" width="50">
                                                    </span>
                                        </td>
                                        <td>
                                            <h6>Andrew</h6>
                                            <small class="text-muted">Project Manager</small>
                                        </td>
                                        <td>Real Homes</td>
                                        <td>
                                            <span class="label label-info">Medium</span>
                                        </td>
                                        <td>$23.9K</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="round round-success">B</span>
                                        </td>
                                        <td>
                                            <h6>Bhavesh patel</h6>
                                            <small class="text-muted">Developer</small>
                                        </td>
                                        <td>MedicalPro Theme</td>
                                        <td>
                                            <span class="label label-danger">High</span>
                                        </td>
                                        <td>$12.9K</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="round round-primary">N</span>
                                        </td>
                                        <td>
                                            <h6>Nirav Joshi</h6>
                                            <small class="text-muted">Frontend Eng</small>
                                        </td>
                                        <td>Elite Admin</td>
                                        <td>
                                            <span class="label label-success">Low</span>
                                        </td>
                                        <td>$10.9K</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="round round-primary">N</span>
                                        </td>
                                        <td>
                                            <h6>Nirav Joshi</h6>
                                            <small class="text-muted">Frontend Eng</small>
                                        </td>
                                        <td>Elite Admin</td>
                                        <td>
                                            <span class="label label-success">Low</span>
                                        </td>
                                        <td>$10.9K</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="round round-primary">N</span>
                                        </td>
                                        <td>
                                            <h6>Nirav Joshi</h6>
                                            <small class="text-muted">Frontend Eng</small>
                                        </td>
                                        <td>Elite Admin</td>
                                        <td>
                                            <span class="label label-success">Low</span>
                                        </td>
                                        <td>$10.9K</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="round round-warning">M</span>
                                        </td>
                                        <td>
                                            <h6>Micheal Doe</h6>
                                            <small class="text-muted">Content Writer</small>
                                        </td>
                                        <td>Helping Hands</td>
                                        <td>
                                            <span class="label label-danger">High</span>
                                        </td>
                                        <td>$12.9K</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="round round-danger">N</span>
                                        </td>
                                        <td>
                                            <h6>Johnathan</h6>
                                            <small class="text-muted">Graphic</small>
                                        </td>
                                        <td>Digital Agency</td>
                                        <td>
                                            <span class="label label-danger">High</span>
                                        </td>
                                        <td>$2.6K</td>
                                    </tr>
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