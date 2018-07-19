@extends ('layouts.tailor')

@section('title')
    Stores
@endsection

@section ('content')
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
                    <h4 class="text-themecolor">My Stores</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Stores</li>
                        </ol>
                        <button data-toggle="modal" data-target="#add-store-modal" type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>

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
                @forelse($stores as $store)
                    <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><a href="{{route('tailor.stores.view', Crypt::encryptString($store->id))}}">{{$store->name ?? 'Unknown'}}</a><br><small>{{$store->description}}</small></h4>
                            <img src="../assets/images/alert/model.png" alt="default" data-toggle="modal" data-target="#add-store-modal" class="model_img img-responsive" />
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add a New Store</h4>
                                <!-- sample modal content -->
                                <img src="../assets/images/alert/model.png" alt="default" data-toggle="modal" data-target="#add-store-modal" class="model_img img-responsive" />
                            </div>
                        </div>
                    </div>
                @endforelse

                {{--Add New Stor Modal--}}
                    <div id="add-store-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <form method="post" action="{{route('tailor.stores.new')}}">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Store</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="name" class="control-label">Store Name</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class="control-label">Phone</label>
                                            <input type="number" class="form-control" id="phone" name="phone" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="address" class="control-label">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="control-label">Description:</label>
                                            <textarea class="form-control" id="description" name="description" required></textarea>
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
                {{--New Store Modal--}}

            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
@endsection

