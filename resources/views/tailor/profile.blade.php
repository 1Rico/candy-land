@extends ('layouts.tailor')

@section('title')
    Profile
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
                    <h4 class="text-themecolor">Profile</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
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
            <!-- Row -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card fixed-height">
                        <div class="card-body">
                            <center class="m-t-30"> <img src="../assets/images/users/5.jpg" class="img-circle" width="150" />
                                <h4 class="card-title m-t-10">{{$tailor->firstname}} {{$tailor->midname}}  {{$tailor->lastname}}</h4>
                                <h6 class="card-subtitle">{{$tailor->address}}</h6>
                                <h6 class="card-subtitle">{{$tailor->date_of_birth ? $tailor->date_of_birth->format('l jS F') : ''}}</h6>
                                <div class="row text-center justify-content-md-center">
                                    <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                    <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                </div>
                            </center>
                        </div>
                        <div>
                            <hr> </div>
                        <div class="card-body"> <small class="text-muted">Email address </small>
                            <h6>{{$tailor->email}}<h6>{{$tailor->phone}}</h6> <small class="text-muted p-t-30 db">Address</small>
                                <h6>{{$tailor->address}}</h6>
                                <div class="map-box">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div> <small class="text-muted p-t-30 db">Social Profile</small>
                                <br/>
                                <button class="btn btn-circle btn-secondary"><i class="fa fa-facebook"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card fixed-height">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs profile-tab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#password" role="tab">Password</a> </li>
                            {{--<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#addresses" role="tab">Addresses</a> </li>--}}
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile" role="tabpanel">
                                <div class="card-body">
                                    <form class="form-horizontal form-material" method="post" action="{{ route('tailor.profile.update') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="col-md-12">First Name</label>
                                            <div class="col-md-12">
                                                <input type="text" name="firstname" value="{{ $tailor->firstname}}" class="form-control form-control-line" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Middle Name</label>
                                            <div class="col-md-12">
                                                <input type="text" name="midname" Value ="{{$tailor->midname}}" class="form-control form-control-line">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Last Name</label>
                                            <div class="col-md-12">
                                                <input type="text" name="lastname" value="{{$tailor->lastname}}" class="form-control form-control-line" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12 row">
                                            <div class="col-md-6 form-group">
                                            <label class="col-md-12">Phone No</label>
                                            <div class="col-md-12">
                                                <input type="number" minlength="8" name="phone" value="{{$tailor->phone}}" class="form-control form-control-line" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="col-md-12">Gender</label>
                                            <div class="col-md-12">
                                                <select name="gender" required class="form-control form-control-line" required>
                                                    <option value=1 {{$tailor->gender == 1 ? 'selected':''}}>Male</option>
                                                    <option value=2 {{$tailor->gender == 2 ? 'selected':''}}>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                        {{--<div class="form-group">--}}
                                            {{--<label class="col-md-12">About Me</label>--}}
                                            {{--<div class="col-md-12">--}}
                                                {{--<textarea rows="5" name="about" class="form-control form-control-line" required>{{$tailor->about}}</textarea>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-success">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane " id="password" role="tabpanel">
                                <div class="card-body">
                                    <form class="form-horizontal form-material" method="post" action="{{ route('tailor.profile.update') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="col-md-12">Current Password</label>
                                            <div class="col-md-12">
                                                <input type="password" placeholder="Current Password" name ="old_password" class="form-control form-control-line">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12">New Password</label>
                                            <div class="col-md-12">
                                                <input type="password" placeholder="Current Password" name="password" class="form-control form-control-line">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-12">Repeat Password</label>
                                            <div class="col-md-12">
                                                <input type="password" value="password" name="password_confirmation" class="form-control form-control-line">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-success">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane " id="addresses" role="tabpanel">
                                <div class="card-body">
                                    <form class="form-horizontal form-material" method="post" action="{{ route('tailor.profile.update') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="col-md-12">Address</label>
                                            <div class="col-md-12">
                                                <input type="text" value="{{$tailor->address}}" name="address" class="form-control form-control-line" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                        <div class="col-md-4 form-group">
                                            <label class="col-md-12">City</label>
                                            <div class="col-md-12">
                                                <input type="text" value="{{$tailor->city}}" class="form-control form-control-line" name="city">
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="col-md-12">State</label>
                                            <div class="col-md-12">
                                                <input type="text" value="{{$tailor->state}}" class="form-control form-control-line" name="state">
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label  class="col-md-12">Country</label>
                                            <div class="col-md-12">
                                                <input type="text" value="{{$tailor->country}}" class="form-control form-control-line" name="country">
                                            </div>
                                        </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12">Enter Delivery Address (Please Include Landmarks)</label>
                                            <div class="col-md-12">
                                                <textarea rows="4"  class="form-control form-control-line" name="delivery_address" required>{{$tailor->delivery_address}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
@endsection