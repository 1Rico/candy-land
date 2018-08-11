@extends('layouts.admin')

@section('title')
    Orders
@endsection

@section('content')
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
                    <h4 class="text-themecolor">Client Orders</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Orders</li>
                        </ol>
                        <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card fixed-height">
                        <div class="card-body">
                            <h4 class="card-title">Orders</h4>
                            <h6 class="card-subtitle">All Orders</h6>
                            <div class="table-responsive m-t-40">

                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Tailor</th>
                                        <th>Design</th>
                                        <th>Store</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>Expected Completion</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($orders as $order)
                                        <tr>
                                            <td><a href="#">{{$order->user->firstname ?? ''}} {{$order->user->lastname ?? ''}}</a></td>
                                            <td><a href="#">{{$order->design->store->tailor->firstname ?? '' }} {{$order->design->store->tailor->lastname ?? '' }}</a></td>
                                            <td>{{$order->design->name ?? ''}}</td>
                                            <td>{{$order->design->store->name ?? ''}}</td>
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
                                            <td><span class="{{$class}}">{{$order->status}}</span></td>
                                            <td>{{$order->created_at->format('jS F, Y') ?? ''}}</td>
                                            <td>{{$order->completion_date->format('jS F, Y') ?? ''}}</td>
                                        </tr>
                                    @empty
                                        <tr rowspan="6">No Orders Yet!</tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>

@endsection

@section('page-js')
    <script src="{{ asset('assets/node_modules/datatables/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });

    </script>
@endsection