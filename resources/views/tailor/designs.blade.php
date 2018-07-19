@extends('layouts.tailor')

@section('title')
    Designs
@endsection

@section('page-css')
    <link href="{{ asset('assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css') }}" rel="stylesheet">
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
                    <h4 class="text-themecolor">Lightbox Popup</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Lightbox Popup</li>
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
                @forelse($tailor->designs as $design)
                <div class="col-lg-3 col-md-6">
                    <!-- Card -->
                    <div class="card" >
                        <div class="zoom-gallery row m-t-30">
                            <div class="col-md-4">
                                <a href="../assets/images/big/img1.jpg" title="Caption. Can be aligned to any side and contain any HTML."> <img src="../assets/images/big/img4.jpg" class="img-responsive" alt="img" /> </a>
                            </div>
                            <div class="col-md-4">
                                <a href="../assets/images/big/img2.jpg" title="This image fits only horizontally."> <img src="../assets/images/big/img5.jpg" class="img-responsive" alt="img" /> </a>
                            </div>
                            <div class="col-md-4">
                                <a href="../assets/images/big/img3.jpg"> <img src="../assets/images/big/img6.jpg" class="img-responsive" alt="img" /> </a>
                            </div>

                            <div class="col-md-4 hide">
                                <a href="../assets/images/big/img3.jpg"> <img src="../assets/images/big/img6.jpg" class="img-responsive" alt="img" /> </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{$design->name}}</h4>
                            <p class="card-text">{{$design->description}}</p>
                            <p class="card-text">{{$design->store->name ?? ''}}</p>
                            <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <!-- Card -->
                </div>
                @empty
                    <div class="col-lg-3 col-md-6">
                        <!-- Card -->
                        <div class="card" >
                           <div class="card-body">
                                <h4 class="card-title">Please Add A Design</h4>
                                <p class="card-text">Populate your designs view to attract customers</p>
                                <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        <!-- Card -->
                    </div>
                @endforelse

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Popup with Youtube Video</h4>
                                    <h6 class="card-subtitle">You can use youtube video with popup just add class <code>popup-youtube</code></h6>
                                    <a class="popup-youtube btn btn-danger" href="http://wrappixel.com/demos/admin-templates/elegant-admin/horizontal/www.youtube.com/watch?v=sK7riqg2mr4">Open YouTube video</a>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="card-title">Google map</h4>
                                    <h6 class="card-subtitle">You can use Googlemap with popup just add class with <code>popup-gmaps</code></h6>
                                    <a class="popup-gmaps btn btn-info" href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom">Open Google Map</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div id="image-popups" class="row">
                                <div class="col-lg-2 col-md-4">
                                    <a href="../assets/images/big/img1.jpg" data-effect="mfp-zoom-in"><img src="../assets/images/big/img1.jpg" class="img-responsive" />
                                        <br/>Zoom</a>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <a href="../assets/images/big/img2.jpg" data-effect="mfp-newspaper"><img src="../assets/images/big/img2.jpg" class="img-responsive" />
                                        <br/>Newspaper</a>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <a href="../assets/images/big/img3.jpg" data-effect="mfp-move-horizontal"><img src="../assets/images/big/img3.jpg" class="img-responsive" />
                                        <br/>Horizontal move</a>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <a href="../assets/images/big/img4.jpg" data-effect="mfp-move-from-top"><img src="../assets/images/big/img4.jpg" class="img-responsive" />
                                        <br/>Move from top</a>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <a href="../assets/images/big/img5.jpg" data-effect="mfp-3d-unfold"><img src="../assets/images/big/img5.jpg" class="img-responsive" />
                                        <br/>3d unfold</a>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <a href="../assets/images/big/img6.jpg" data-effect="mfp-zoom-out"><img src="../assets/images/big/img5.jpg" class="img-responsive" />
                                        <br/>Zoom-out</a>
                                </div>
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
    <script src="{{ asset('assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js') }}"></script>
    @endsection