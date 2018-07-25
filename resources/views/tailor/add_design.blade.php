@extends('layouts.tailor')

@section('title')
    New Design
@endsection

@section('page-css')
    <link href="{{ asset('assets/node_modules/dropzone-master/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/pages/floating-label.css') }}" rel="stylesheet">
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
                    <h4 class="text-themecolor">Form Dropzone</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Form Dropzone</li>
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
                <div class="col-lg-6 col-md-6">
                    <div class="card fixed-height">
                        <div class="card-body">
                            <h4 class="card-title">Animated Line Inputs Form With Floating Labels</h4>
                            <h6 class="card-subtitle">Just add <code>floating-labels</code> class to the form.</h6>
                            <form class="floating-labels m-t-40" enctype="multipart/form-data" method="post" action="{{route('tailor.designs.save')}}" id="design-form">
                                @csrf
                                <div class="form-group m-b-40">
                                    <select class="form-control p-0" id="input5" name="store_id" required>
                                        <option selected disabled>Select a Store</option>
                                        @forelse($tailor->stores as $store)
                                            <option value="{{$store->id}}">{{$store->name ?? 'Unknown'}}</option>
                                        @empty
                                            <option selected disabled>Please Create a Store First</option>
                                        @endforelse
                                    </select><span class="bar"></span>
                                    <label for="input5">Select Store</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" id="input1" name="name" required>
                                    <span class="bar"></span>
                                    <label for="input1">Name</label>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 m-b-40">
                                        <input type="number" class="form-control" id="input2" name="amount" min="10" required>
                                        <span class="bar"></span>
                                        <label for="input2">Amount</label>
                                    </div>
                                    <div class="form-group col-md-6 m-b-40">
                                        <input type="number" class="form-control" id="input4" name="duration" min="1" required>
                                        <span class="bar"></span>
                                        <label for="input2">How Long To Make This? (Days)</label>
                                    </div>
                                </div>
                                <div class="form-group m-b-40">
                                    <input type="number" class="form-control" id="input3" name="discount_amount" min="10" required>
                                    <span class="bar"></span>
                                    <label for="input3">Discount Amount</label>
                                    <span class="help-block"><small>The new amount after you've placed discount</small></span>
                                </div>
                                <div class="form-group m-b-40">
                                    <select class="form-control p-0" id="input6" name="status" required>
                                        <option selected value="1">Available</option>
                                        <option value="0">Unavailable</option>
                                    </select><span class="bar"></span>
                                    <label for="input6">Status</label>
                                </div>
                                <div class="form-group m-b-5">
                                    <textarea class="form-control" rows="4" id="input7" name="description" required></textarea>
                                    <span class="bar"></span>
                                    <label for="input7">Description</label>
                                </div>

                                <input class="form-control" type="file" name="image[]" multiple required>

                                <div>
                                    <button type="submit" class="btn btn-purple">Save Design</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="card fixed-height">
                        <div class="card-body">
                            <h4 class="card-title">Dropzone</h4>
                            <h6 class="card-subtitle">Please Select Design Templates <code>.dropzone</code> to form.</h6>
                            <form action="{{route('tailor.designs.save')}}" class="dropzone" method="post" enctype="multipart/form-data" id="file-form">
                                <div class="fallback">
                                    <input name="file" required type="file" multiple data-default-file="{{ asset('assets/node_modules/dropify/src/images/test-image-1.jpg') }}" />
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

@section('page-js')
    <script src="{{ asset('assets/node_modules/dropzone-master/dist/dropzone.js') }}"></script>
    <script>
//        $(function () {
//            $('#submit-button').click( function (){
//                $('#file-form').submit();
//            });
//        });
//$('#file-form').submit(function (event) {
//    if(!this.checkValidity())
//    {
//        event.preventDefault();
//    }
//});
    </script>
@endsection