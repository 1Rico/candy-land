@extends('layouts.user')

@section('title')
    Measurements
@endsection

@section('page-css')
    <link href="{{ asset('assets/node_modules/horizontal-timeline/css/horizontal-timeline.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/timeline-vertical-horizontal.css') }}" rel="stylesheet">
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
                    <h4 class="text-themecolor">Horizontal Timeline</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Horizontal Timeline</li>
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
                <div id="add-measurement-modal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <form method="post" action="{{route('user.measurements.new')}}">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Neck</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="shoulder_width" class="control-label">Shoulder Width</label>
                                            <input type="text" class="form-control" id="shoulder_width" name="shoulder_width" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="arm_hole" class="control-label">Arm Hole</label>
                                            <input type="number" class="form-control" id="arm_hole" name="arm_hole" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="arm_length" class="control-label">Arm Length</label>
                                            <input type="text" class="form-control" id="" name="arm_or_sleeve_length" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="pant_length" class="control-label">Pant Length</label>
                                            <input class="form-control" id="pant_or_skirt_length" name="pant_or_skirt_length" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="inseam" class="control-label">Inseam:</label>
                                            <input class="form-control" id="inseam" name="inseam" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="wrist" class="control-label">Wrist:</label>
                                            <input class="form-control" id="wrist" name="wrist" required />
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="neck" class="control-label">Neck </label>
                                            <input type="text" class="form-control" id="neck" name="neck" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="chest_bust" class="control-label">Chest Bust</label>
                                            <input type="number" class="form-control" id="chest_bust" name="chest_bust" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="high_bust" class="control-label">Pant/High Burst</label>
                                            <input type="text" class="form-control" id="high_bust" name="high_bust" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="under_bust" class="control-label">Under Wrist</label>
                                            <input class="form-control" id="under_bust" name="under_bust" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="waist" class="control-label">Waist</label>
                                            <input class="form-control" id="waist" name="waist" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="hips" class="control-label">Hips</label>
                                            <input class="form-control" id="hips" name="hips" required />
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger waves-effect waves-light">Create Store</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <section class="cd-horizontal-timeline">
                                <div class="timeline">
                                    <div class="events-wrapper">
                                        <div class="events">
                                            <ol>
                                                @forelse($user->measurements as $measurement)
                                                    <li><a href="#0" data-date="{{$measurement->date_created}}" class="selected">{{$measurement->date_created}}</a></li>
                                                @empty
                                                    <li><a href="#0" class="selected">No Measurements</a></li>
                                                @endforelse
                                            </ol>
                                            <span class="filling-line" aria-hidden="true"></span>
                                        </div>
                                        <!-- .events -->
                                    </div>
                                    <!-- .events-wrapper -->
                                    <ul class="cd-timeline-navigation">
                                        <li><a href="#0" class="prev inactive">Prev</a></li>
                                        <li><a href="#0" class="next">Next</a></li>
                                    </ul>
                                    <!-- .cd-timeline-navigation -->
                                </div>
                                <!-- .timeline -->
                                <div class="events-content">
                                    <ol>
                                        @forelse($user->measurements as $measurement)
                                        <li class="" data-date="{{$measurement->date_created}}">
                                            <h2>
                                                {{--<img class="img-circle pull-left m-r-20 m-b-10" width="60" alt="user"  alt="user">--}}
                                                Horizontal Timeline<br/><small>January 16th, 2014</small></h2>
                                            <p class="m-t-40">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                            </p>
                                            <p>
                                                <button class="btn btn-rounded btn-outline-info m-t-20">Read more</button>
                                            </p>
                                        </li>
                                            @empty
                                        None
                                            @endforelse
                                    </ol>
                                </div>
                                <!-- .events-content -->
                            </section>
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
    <script src="{{asset('assets/node_modules/horizontal-timeline/js/horizontal-timeline.js')}}"></script>
@endsection




