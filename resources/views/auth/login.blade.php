<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ _('Login') }} | {{ _('Serbagunabisa') }}</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ URL::asset('assets/dashboard/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('assets/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('assets/dashboard/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('home.index') }}" class="h1"><b>Serbaguna</b>BESAR</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form method="post" action="{{ route('login.perform') }}">
                    @csrf
                    <div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                                placeholder="Email or Username" required="" autofocus />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @if ($errors->has('username'))
                                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                    </div>
                    <div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                                placeholder="Password" required="" />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @if ($errors->has('password'))
                                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('assets/dashboard/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ URL::asset('assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ URL::asset('assets/dashboard/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
