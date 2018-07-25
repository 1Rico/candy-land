@extends('layouts.user')

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
                    <h4 class="text-themecolor">All Designs</h4>
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
                <div id="orderModal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Design NAme</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <div class="row" id="page1">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="shoulder_width" class="control-label">Shoulder Width</label>
                                            <input type="text" value="{{$user->measurement->shoulder_width}}" class="form-control" id="shoulder_width" name="shoulder_width" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="arm_hole" class="control-label">Arm Hole</label>
                                            <input type="number" value="{{$user->measurement->arm_hole}}" class="form-control" id="arm_hole" name="arm_hole" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="arm_length" class="control-label">Arm Length</label>
                                            <input type="text" class="form-control" value="{{$user->measurement->arm_or_sleeve_length}}" id="" name="arm_or_sleeve_length" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="pant_length" class="control-label">Pant Length</label>
                                            <input class="form-control" value="{{$user->measurement->pant_or_skirt_length}}" id="pant_or_skirt_length" name="pant_or_skirt_length" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="inseam" class="control-label">Inseam:</label>
                                            <input class="form-control" value="{{$user->measurement->inseam}}" id="inseam" name="inseam" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="wrist" class="control-label">Wrist:</label>
                                            <input class="form-control" value="{{$user->measurement->wrist}}" id="wrist" name="wrist" required />
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="neck" class="control-label">Neck </label>
                                            <input type="text" class="form-control" value="{{$user->measurement->neck}}" id="neck" name="neck" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="chest_bust" class="control-label">Chest Bust</label>
                                            <input type="number" class="form-control" value="{{$user->measurement->chest_bust}}" id="chest_bust" name="chest_bust" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="high_bust" class="control-label">Pant/High Burst</label>
                                            <input type="text" class="form-control" value="{{$user->measurement->high_bust}}" id="high_bust" name="high_bust" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="under_bust" class="control-label">Under Wrist</label>
                                            <input class="form-control" id="under_bust" value="{{$user->measurement->under_bust}}" name="under_bust" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="waist" class="control-label">Waist</label>
                                            <input class="form-control" id="waist" name="waist" value="{{$user->measurement->waist}}" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="hips" class="control-label">Hips</label>
                                            <input class="form-control" id="hips" name="hips" value="{{$user->measurement->hips}}" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="page2" style="display: none;">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <img class="card-img-top img-responsive" src="../assets/images/big/img1.jpg" alt="Card image cap">
                                            <div class="card-body">
                                                <form method="post" action="{{ route('user.order.create') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <h4 class="card-title" id="tailor_name"></h4>
                                                    <p class="card-text" id="description"></p>
                                                    <hr>
                                                    <p class="card-text" id="amount">
                                                        <br><small class="text-danger" id="discount_amount" style="text-decoration: line-through">24000</small></p>
                                                    <input type="hidden" value="" name="data" id="data">
                                                    <button class="btn btn-primary" type="submit">Confirm</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button id="previous" class="btn btn-danger waves-effect waves-light">Previous</button>
                                <button id="next" class="btn btn-danger waves-effect waves-light">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($designs as  $design)
                    @php $images = $design->getMedia();
                    @endphp
                    <div class="col-lg-3 col-md-6">
                        <!-- Card -->
                        <div class="card">
                            <div class="zoom-gallery row m-t-30">
                                <div class="col-md-4">
                                    <a href="{{ $images[0]->getUrl() }}" title="Caption. Can be aligned to any side and contain any HTML."> <img src="{{ $images[0]->getUrl() }}" class="img-responsive" alt="img" /> </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ $images[1]->getUrl() }}" title="This image fits only horizontally."> <img src="{{ $images[1]->getUrl() }}" class="img-responsive" alt="img" /> </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ $images[2]->getUrl() }}"> <img src="{{ $images[2]->getUrl() }}" class="img-responsive" alt="img" /> </a>
                                </div>

                                {{--<div class="col-md-4 hide">--}}
                                    {{--<a href="{{ $images[2]->getUrl() ?? $images[2]->getUrl() }}"> <img src="{{ $images[2]->getUrl() ?? $images[2]->getUrl() }}" class="img-responsive" alt="img" /> </a>--}}
                                {{--</div>--}}
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{$design->name}}</h4>
                                <p class="card-text">{{$design->description}}</p>
                                <p class="card-text">Designer: <a href="javascript:void(0)">{{$design->store->tailor->firstname}} {{$design->store->tailor->lastname}}</a></p>
                                <p class="card-text">Store: <a href="javascript:void(0)">{{$design->store->name ?? ''}}</a></p>

                                <a href="javascript:void(0)" data-toggle="modal"
                                   data-target="#orderModal"
                                   data-tailor_name = {{$design->store->tailor->firstname}} {{$design->store->tailor->lastname}}
                                           data-tailor_id = {{$design->store->tailor->id}}
                                data-discount_amount={{$design->discount_amount}}
                                data-description="{{$design->description}}"
                                data-design_id={{$design->id}}
                                data-delivery_address = "{{$design->delivery_address}}"
                                data-duration = "{{$design->duration}}"
                                data-name="{{$design->name}}"
                                data-amount={{$design->amount}}
                                class="btn btn-primary">Order
                                </a>
                            </div>
                        </div>
                        <!-- Card -->
                    </div>
                @empty
                    <div class="col-lg-3 col-md-6">
                        <!-- Card -->
                        <div class="card" >
                            <div class="card-body">
                                <h4 class="card-title">No Designs Available FOr Now!</h4>
                                <p class="card-text">Please check back at a later time.</p>
                                {{--<a href="javascript:void(0)" class="btn btn-primary">Make Order</a>--}}
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

    <script>
        $(document).ready(function() {
            var user_id = '{{$user->id}}';

            $('#next').click(function () {
                $('#page1').hide();
                $('#page2').fadeIn();
            });
            $('#previous').click(function () {
                $('#page2').hide();
                $('#page1').fadeIn();
            });

            $('#orderModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var design_id = button.data('design_id');// Extract info from data-* attributes
                var amount = button.data('amount');
                var discount_amount = button.data('discount_amount');
                var description = button.data('description');
                var tailor_id = button.data('tailor_id');
                var tailor_name = button.data('tailor_name');
                var delivery_address = button.data('delivery_address');
                var duration = button.data('duration');

                var order_data = {
                    'design_id' : design_id,
                    'user_id' : user_id,
                    'tailor_id' : tailor_id,
                    'amount': amount,
                    'duration' : duration,
                    'delivery_address' : delivery_address
                };

                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('#name').text(name);
                modal.find('#tailor_name').text('By: '+ tailor_name);
                modal.find('#description').text(description);
                modal.find('#amount').text('Price: NGN'+ amount);
                modal.find('#discount_amount').text(discount_amount);
                modal.find('#data').val(JSON.stringify(order_data));
            });
        });
    </script>
@endsection
