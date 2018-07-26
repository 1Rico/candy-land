@extends ('layouts.auth')

@section('title')
    Register
@endsection

@section('content')
    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(assets/images/background/login-register.jpg);">
        <div class="login-box card">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" action="{{ route('register') }}" method="post">
                    @csrf
                    <a href="javascript:void(0)" class="text-center db"><img src="../assets/images/logo-icon.png" alt="Home" /><br/><img src="../assets/images/logo-text.png" alt="Home" /></a>
                    <h3 class="box-title m-t-40 m-b-0">Register Now</h3><small>Create your account and enjoy</small>
                    <div class="form-group m-t-20 {{ $errors->has('firstname') ? ' has-danger' : '' }}">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" value="{{ old('firstname') }}" name="firstname" placeholder="First Name">
                            @if ($errors->has('firstname'))
                                <div class="form-control-feedback">{{ $errors->first('firstname') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('lastname') ? ' has-danger' : '' }}">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" value="{{ old('lastname') }}" name="lastname" placeholder="Last Name">
                            @if ($errors->has('lastname'))
                                <div class="form-control-feedback">{{ $errors->first('lastname') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" value="{{ old('email') }}" name="email" placeholder="Email">
                            @if ($errors->has('email'))
                                <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                        <div class="col-xs-12">
                            <input class="form-control" type="number" minlength="8" required="" value="{{ old('phone') }}" name="phone" placeholder="Phone">
                            @if ($errors->has('email'))
                                <div class="form-control-feedback">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender" required>
                            <option value=1>Male</option>
                            <option value=2>Female</option>
                        </select>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" minlength="6" required="" placeholder="Password">
                            @if ($errors->has('password'))
                                <div class="form-control-feedback">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password_confirmation" minlength="6" required="" placeholder="Confirm Password">
                            @if ($errors->has('password_confirmation'))
                                <div class="form-control-feedback">{{ $errors->first('password_confirmation') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                                <label class="custom-control-label" for="customCheck1">I agree to all <a href="javascript:void(0)">Terms</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Already have an account? <a href="{{ route('login') }}" class="text-info m-l-5"><b>Sign In</b></a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection