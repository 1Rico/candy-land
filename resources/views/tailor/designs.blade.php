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
                    <h4 class="text-themecolor">My Designs</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Lightbox Popup</li>
                        </ol>
                        <a href="{{ route('tailor.designs.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
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
                <div id="designModal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Design NAme</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <img class="card-img-top img-responsive" src="../assets/images/big/img1.jpg" alt="Card image cap">
                                            <div class="card-body">
                                                <form method="post" action="{{ route('user.order.create') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <h4 class="card-title" id="tailor_name"></h4>
                                                    <p class="card-text"  id="description"></p>
                                                    <hr>
                                                    <p class="card-text" id="amount">
                                                        <br><small class="text-danger" id="discount_amount" style="text-decoration: line-through">24000</small></p>
                                                    <input type="hidden" value="" name="data" id="data">
                                                    {{--<button class="btn btn-primary" type="submit">Confirm</button>--}}
                                                </form>
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
                @forelse($designs as $design)
                    @php $images = $design->getMedia();
                    @endphp
                    <div class="col-lg-3 col-md-6">
                        <!-- Card -->
                        <div class="card">
                            <div class="zoom-gallery row m-t-30">
                                <div class="col-md-12">
                                    <a href="{{ $images[0]->getUrl() }}" title="Caption. Can be aligned to any side and contain any HTML."> <img src="{{ $images[0]->getUrl('thumb') }}" class="img-responsive" alt="img" /> </a>
                                </div>
                                <div class="col-md-4 hide">
                                    <a href="{{ $images[1]->getUrl() }}" title="This image fits only horizontally."> <img src="{{ $images[1]->getUrl('thumb') }}" class="img-responsive" alt="img" /> </a>
                                </div>
                                @if(isset($images[2]))
                                    <div class="col-md-4 hide">
                                        <a href="{{ $images[2]->getUrl()  ?? '#' }}"> <img src="{{ $images[2]->getUrl('thumb') }}" class="img-responsive" alt="img" /> </a>
                                    </div>
                                @endif

                                {{--<div class="col-md-4 hide">--}}
                                {{--<a href="{{ $images[2]->getUrl() ?? $images[2]->getUrl() }}"> <img src="{{ $images[2]->getUrl() ?? $images[2]->getUrl() }}" class="img-responsive" alt="img" /> </a>--}}
                                {{--</div>--}}
                            </div>
                            {{--<img class="card-img-top img-responsive" src="../assets/images/big/img1.jpg" alt="Card image cap">--}}
                            <div class="card-body">
                                <h4 class="card-title">{{$design->name}}</h4>
                                {{--<p class="card-text">{{$design->description}}</p>--}}
                                <p class="card-text">Designer: <a href="javascript:void(0)">{{$design->store->tailor->firstname}} {{$design->store->tailor->lastname}}</a></p>
                                <p class="card-text">Store: <a href="javascript:void(0)">{{$design->store->name ?? ''}}</a></p>

                                <a href="javascript:void(0)" data-toggle="modal"
                                   data-target="#designModal"
                                   data-tailor_name = {{$design->store->tailor->firstname}} {{$design->store->tailor->lastname}}
                                           data-tailor_id = {{$design->store->tailor->id}}
                                data-discount_amount={{$design->discount_amount}}
                                data-description="{{$design->description}}"
                                data-design_id={{$design->id}}
                                data-delivery_address = "{{$design->delivery_address}}"
                                data-duration = "{{$design->duration}}"
                                data-name="{{$design->name}}"
                                data-amount={{$design->amount}}
                                class="btn btn-primary">View
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

            $('#designModal').on('show.bs.modal', function (event) {
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
//                    'user_id' : user_id,
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
//                modal.find('#description').text(description);
                modal.find('#amount').text('Price: NGN'+ amount);
                modal.find('#discount_amount').text(discount_amount);
                modal.find('#data').val(JSON.stringify(order_data));
            });
        });
    </script>
@endsection