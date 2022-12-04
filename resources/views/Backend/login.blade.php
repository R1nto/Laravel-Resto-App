<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin | Restoran Rinto</title>
    <link rel="stylesheet" href="{{ asset("bootstrap/css/bootstrap.min.css") }}">
</head>
<body>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-4">
                <h3 class="text-center">Login Admin Restoran</h3>
                <form action="{{ url('admin/postlogin') }}" method="post">
                    @csrf
                    @if (Session::has('pesan'))
                        <div class="alert alert-danger">
                            {{ Session::get('pesan') }}
                        </div>
                    @endif
                    <div class="mt-2">
                        <label class="form-label" for="">Email</label>
                        <input class="form-control" value="{{ old('email') }}" type="text" name="email" id="">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mt-2">
                        <label class="form-label" for="">Password</label>
                        <input class="form-control" value="{{ old('password') }}" type="password" name="password" id="">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="{{ asset("bootstrap/js/bootstrap.min.js") }}"></script>
</body>
</html>