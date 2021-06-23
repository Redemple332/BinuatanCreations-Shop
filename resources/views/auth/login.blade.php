{{-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css"  rel="stylesheet" href="{{ asset('logincss/style.css') }}">
        <link type="text/css"  rel="stylesheet" href="{{ asset('logincss/rgd.css') }}">
        <link type="text/css"  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Binuatan Creation - Login</title>
    </head>

    <body>

        <div class="work-area">

            <div class="container">
        
                <div class="card">
                    <div class="card-form">
                        <div class="card-logo">
                            <h1>Logo HERE</h1>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-un enter">
                                <input class="focus-design @error('email') is-invalid @enderror"placeholder="E-mail / Username / phone" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <span class="ico"><i class=" fa fa-user " id=" user-icon " aria-hidden=" true "></i>
                            </div>                           
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="input-ps enter">
                                <input  class="focus-design @error('password') is-invalid @enderror" class="check"  type="password" placeholder="Password" pattern="\S+.*" id="password"  name="password" required autocomplete="current-password">
                                <span class="ico"><i class="fa fa-lock" id="lock-icon" aria-hidden="true"></i></span>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            <div class="forgot-password">
                                <a href="#">forget password</a>
                            </div>

                            <div class="red-btn">
                                <a href="#asga"><input type="submit" value="shop now"></a>
                            </div>
                        </form> 
                        <div class="label-social"> 
                            <p>Or Continue with</p>
                        </div>
                        <div class="social">
                            <a href="#fb" class="fbico"><span ><i class=" fa fa-facebook " id=" user-icon " aria-hidden=" true "></i></span></a>
                            <a href="#google" class="googleico"><span ><i class=" fa fa-google " id=" user-icon " aria-hidden=" true "></i></span></a>
                            <a href="#twitter" class="twitterico"><span ><i class=" fa fa-twitter " id=" user-icon " aria-hidden=" true "></i></span></a>
                        </div>
                        <div class="input-reg">
                            <p>don't have an account? <a href="register.html">Register</a></p>
                        </div>     
                    </div>
                </div>
                <div class="card-pic">
                    <img src="{{ asset('logincss/3.jpg') }}" alt="">
                <div class="ad-text">
                    <H1>Hot Sale</H1>
                    <h2>50% off!</h2>
                    <p>Sept 10 - Dec 5</p>
                </div>
            </div>
        </div>
    </body>
</html>