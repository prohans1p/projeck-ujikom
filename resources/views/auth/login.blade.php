<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
</head>
  <body>
    <div class="container">
        <div class="login">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>LOGIN</h1>
                <hr>
                <div class="c10 row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-md-end">Email</label>
                  <div class="col-sm-10">
                    <input id="inputEmail3" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                </div>
                </div>
                <div class="c10 row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label text-md-end">{{ __('Password') }}</label>
                  <div class="col-sm-10">
                    <input id="inputPassword3" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-flex justify-content-center">
                    {{ __('Login') }}
                </button>
            </form>
        </div>
        <div class="right">
            <img src="image/barang-removebg-preview.png" alt="">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
