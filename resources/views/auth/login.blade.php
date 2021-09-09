<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | Noor Kitchen</title>

    <link rel="icon" href="{{asset('Icons/invoice.svg')}}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="text-center">
    <div class="container">
        <div class="img">
            <img src="{{asset('Icons/invoice.svg')}}" />
        </div>
        <div class="login-content">
            <form method="POST" action="{{route('login')}}">
                @csrf
                <img src="{{asset('Icons/profile.svg')}}" />
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="current-password">
                    </div>
                </div>
                <input type="submit" class="btn" value="Login" />
                <div class="m-2">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <p style="font-size: 8px;"><strong>{{ $error }}</strong> </p>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="copyright">
                    <p>&copy; {{date('Y')}} Noor Kitchen Hygenic Suppliers</p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>