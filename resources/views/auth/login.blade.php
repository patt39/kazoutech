@extends('inc.site._main')
@section('title', '')

@section('style')
@endsection

@section('init')
    <!-- Site wrapper -->
@endsection

@section('content')
    <main>
        <section class="section section-shaped section-lg">
            <div class="shape shape-style-1 bg-gradient-default">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="container pt-lg-md">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-header bg-white pb-5">
                                <div class="text-muted text-center mb-3"><small>Sign in with</small></div>
                                <div class="btn-wrapper text-center">
                                    <a href="#" class="btn btn-neutral btn-icon">
                                        <span class="btn-inner--icon">
                                          <img alt="image" src="/assets/site/assets/img/icons/common/github.svg">
                                        </span>
                                        <span class="btn-inner--text">Github</span>
                                    </a>
                                    <a href="#" class="btn btn-neutral btn-icon">
                                        <span class="btn-inner--icon">
                                          <img alt="image" src="/assets/site/assets/img/icons/common/google.svg">
                                        </span>
                                        <span class="btn-inner--text">Google</span>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <small>Or sign in with credentials</small>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customCheckLogin">
                                            <span>Remember me</span>
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary my-4">{{ __('Sign in') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                @if (Route::has('password.request'))
                                    <a class="text-light" href="{{ route('password.request') }}">
                                       <small>{{ __('Forgot Your Password?') }}</small>
                                    </a>
                                @endif
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('register') }}" class="text-light"><small>Create new account</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')

@endsection
