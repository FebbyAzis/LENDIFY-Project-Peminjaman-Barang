<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up - SIPDKM</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    
    <link rel="shortcut icon" href="{{asset('images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <div id="auth">
        
<div class="container">
    <div class="row">
        <div class="col-md-7 col-sm-12 mx-auto">
            <div class="card">
                <div class="card-body mb-3">
                    
                    <div class="text-center mb-2">
                        <img src="{{asset('logo1.jpg')}}" height="120" class='mb-2'>
                        <h3>Sign Up</h3>
                        <p>Please fill the form to register.</p>
                    </div>
                    <form method="POST" action="{{ url('/register-admin') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="nama_depan">Nama Depan</label>
                                    <input id="nama_depan" type="text" class="form-control" name="nama_depan" value="{{ old('nama_depan') }}" required autofocus>
                                    @if ($errors->has('nama_depan'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nama_depan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="nama_belakang">Nama Belakang</label>
                                    <input id="nama_belakang" type="text" class="form-control" name="nama_belakang" value="{{ old('nama_belakang') }}" required autofocus>
                                    @if ($errors->has('nama_belakang'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nama_belakang') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="no_tlp">Nomor Telepon</label>
                                    <input id="no_tlp" type="text" class="form-control" name="no_tlp" value="{{ old('no_tlp') }}" required>

                                    @if ($errors->has('no_tlp'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('no_tlp') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="password-confirm">Confirm Password</label>
                                    <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                            <input type="hidden" name="role" value="1">
                        </diV>

                                <a href="auth-login.html">Have an account? Login</a>
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
