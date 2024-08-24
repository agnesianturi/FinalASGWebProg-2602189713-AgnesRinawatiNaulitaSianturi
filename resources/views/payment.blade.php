<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Payment</title>
</head>
<body>
    <div class="login-container-fluid" style="height: 100vh">
        <div class="form-area">
            <h4>Registration Payment</h4>
            <p>To enjoy the features, please pay the right amount below</p>
            <div class="amount-area" style="display: flex; justify-content: center; align-items: center; margin-bottom: 1rem">
                <h5>{{ $registerPrice }}</h5>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('underpaid'))
                <div class="alert alert-danger">
                    {{ session('underpaid') }}
                </div>
            @endif

            @if (session ('overpaid'))
                <div class="alert alert-warning">
                    {{ session('overpaid')['message'] }} Do you want to keep the remainings to your wallet or re-enter?
                    <form method="POST" action="{{ route('keepToWallet') }}" style="display: inline">
                        @csrf
                        <input type="hidden" name="difference" value="{{ session('overpaid')['difference'] }}">
                        <button type="submit">Keep to my wallet</button>
                    </form>
                </div>
            @endif

            <form method="POST" action="{{ route('paymentProcess') }}">
                @csrf
                <div class="mb-4">
                    <input type="number" class="form-control" id="paymentAmount" name="paymentAmount" placeholder="Input the amount here" required>
                </div>

                <input type="hidden" id="price" name="registerPrice" value="{{ $registerPrice }}">
    
                <div class="mb-2">
                    <button type="submit" class="btn btn-primary">Pay</button>
                </div>
            </form>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>