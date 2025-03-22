<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in - LENDIFY</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    
    <link rel="shortcut icon" href="{{asset('logo1.jpg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <div id="auth">
        
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto" >
        
            <div class="card">
                <div class="card-body mb-3">
                    <div class="text-center mt-2 mb-4">
                        {{-- <img src="{{asset('logo1.jpg')}}" height="120" class='mb-2'> --}}
                        <h3>Sign In</h3>
                        <p>Please sign in to continue to LENDIFY.</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        
                        {{ csrf_field() }}
                        <div class="form-group position-relative has-icon-left">
                            <label for="username">Username</label>
                            <div class="position-relative">
                                <input id="name" type="name" name="name" class="form-control" placeholder="Username" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left">
                            <div class="clearfix">
                                <label for="password">Password</label>
                                
                            </div>
                            <div class="position-relative">
                                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                <div class="form-control-icon">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                        </div>

                        
                        <a href="{{url('/register')}}">Don't have an account? Register</a>
                        <div class="clearfix">
                            <button class="btn btn-primary float-right" type="submit">Submit</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
    <script src="{{asset('js/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>
