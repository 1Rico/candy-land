@extends('layouts.user')

@section('title')
    Order Details
@endsection

@section('content')
    <div class="page-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Order Details</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">orders</li>
                        </ol>
                        <button data-toggle="modal" data-target="#add-measurement-modal" type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>

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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="m-b-0 text-white">Please Treat Every Order With Urgency/h4>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">

                                    <h3 class="box-title">Client Measurement</h3>
                                    <hr class="m-t-0 m-b-40">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Neck:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$order->user->measurement->neck ?? 'Not Provided'}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Chest/Bust:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$order->user->measurement->chest_bust ?? 'Not Provided'}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">High Bust:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$order->user->measurement->high_bust ?? 'Not Provided'}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Under Bust:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$order->user->measurement->under_bust ?? 'Not Provided'}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Waist:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$order->user->measurement->waist ?? 'Not Provided'}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Hips:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$order->user->measurement->hips ?? 'Not Provided'}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Shoulder Width:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{{$order->user->measurement->shoulder_width ?? 'Not Provided'}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Arm Hole:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{{$order->user->measurement->arm_hole ?? 'Not Provided'}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Arm/Sleeve Length:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$order->user->measurement->arm_or_sleeve_length ?? 'Not Provided'}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Skirt/Pants Length:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$order->user->measurement->pant_or_skirt_length ?? 'Not Provided'}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Inseam:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$order->user->measurement->inseam ?? 'Not Provided'}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Wrist:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$order->user->measurement->wrist ?? 'Not Provided'}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="box-title">Personal Info</h3>
                                    <hr class="m-t-0 m-b-40">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">First Name:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$order->user->firstname}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Last Name:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$order->user->lastname}}  </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Gender:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$order->user->gender}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Age:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> 11/06/1987 </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>

                                    <h3 class="box-title">Order Details</h3>
                                    <hr class="m-t-0 m-b-40">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Reference:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$order->reference}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Amount</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">NGN {{number_format($order->amount, 2)}}  </p>
                                                </div>
                                            </div>
                                        </div>

                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Design:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><a  href="#">{{$order->design->name}}</a> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Expected Completion Date:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$order->created_at->addDays($order->design->duration)->format('l jS F, Y')}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/span-->
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Status:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
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
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Delivery Address:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$order->delivery_address ?? 'Not Provided'}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn btn-danger"> <i class="fa fa-pencil"></i> Edit</button>
                                                    <button type="button" class="btn btn-inverse">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"> </div>
                                    </div>
                                </div>
                            </form>
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



