<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>Login Page</title>
</head>
<body>
    <div class="login-container-fluid" style="height:100vh">
        <div class="form-area">
            <h4>Login</h4>
            <p>Connect with your collegues</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <div class="form-floating mt-4 mb-3">
                    <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="email" value="{{ old('email') }}" required autofocus>
                    <label for="floatingEmail">Email</label>
                </div>
    
                <div class="form-floating mt-4 mb-4">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="password" required>
                    <label for="floatingPassword">Password</label>
                </div>
    
                <div class="button-register" style="display: flex; justify-content: center">
                    <button type="submit" class="btn btn-primary" style="width: 34.5vw; height: 3rem; background-color:rgb(50, 107, 198); border-color: rgb(50, 107, 198);">Login</button>
                </div>
            </form>

            <div class="register-here-area" style="display: flex; justify-content:center; align-items:center; margin-top:1rem">
                <h6 style="font-weight:normal">Don't have account?</h6>
                <h6 style="color: rgb(50, 107, 198); margin-left: 0.5rem">
                    <a href="{{ url('/register') }}" style="color: inherit; text-decoration: none">Register here</a>
                </h6>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>