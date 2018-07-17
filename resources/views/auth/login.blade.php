@extends ('layouts.auth')

@section('title')
    Login
@endsection

@section('content')
    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" method="post" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf

                    <a href="javascript:void(0)" class="text-center db"><img src="{{ asset('assets/images/logo-icon.png') }}" alt="Home" /><br/><img src="{{ asset('assets/images/logo-text.png') }}" alt="Home" /></a>
                    <div class="form-group m-t-40 {{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="col-xs-12">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="col-xs-12">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <div class="form-control-feedback">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" {{ old('remember') ? 'checked' : '' }} id="remember" {{ __('Remember Me') }}>
                                <label class="custom-control-label" for="remember">Remember me</label>
                                <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit">Log In</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                            <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a> </div>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            Don't have an account? <a href= "{{route('register')}}" class="text-primary m-l-5"><b>Sign Up</b></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @endsection