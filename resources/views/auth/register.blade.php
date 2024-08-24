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
    <div class="login-container-fluid">
        <div class="form-area">
            <h4>Register</h4>
            <p>Start connecting with your collegues</p>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mt-4 mb-3">
                    <input type="name" class="form-control" id="floatingName" name="name" value="{{ old('name') }}" required autofocus>
                    <label for="floatingName">Name</label>
                </div>
    
                <div class="form-floating mt-4 mb-3">
                    <input type="email" class="form-control" id="floatingEmail" name="email" value="{{ old('email') }}" required>
                    <label for="floatingEmail">Email</label>
                </div>
    
                <div class="form-floating mt-4 mb-3">
                    <input type="password" class="form-control" id="floatingPassword" name="password" required>
                    <label for="floatingPassword">Password</label>
                </div>
    
                <div class="form-floating mt-4 mb-3">
                    <input type="number" class="form-control" id="floatingAge" name="age" value="{{ old('age') }}" required>
                    <label for="floatingAge">Age</label>
                </div>
    
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" name="gender" aria-label="Gender" required>
                        <option selected>Choose</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                    <label for="floatingSelect">Gender</label>
                </div>
    
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingUsername" name="linkedinUsername" value="{{ old('linkedinUsername') }}" required>
                    <label for="floatingUsername">LinkedIn Username</label>
                </div>
    
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingMobileNumber" name="mobileNumber" value="{{ old('mobileNumber') }}" required>
                    <label for="floatingMobileNumber">Mobile Number</label>
                </div>
    
                <div class="check-area mb-4" style="border-color: black">
                    <h6>Fields of Work</h6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="field1" name="fieldsOfWork[]" value="Business & Management">
                        <label class="form-check-label" for="field1">Business & Management</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="field2" name="fieldsOfWork[]" value="Food & Beverages">
                        <label class="form-check-label" for="field2">Food & Beverages</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="field3" name="fieldsOfWork[]" value="Science & Technology">
                        <label class="form-check-label" for="field3">Science & Technology</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="field4" name="fieldsOfWork[]" value="Education">
                        <label class="form-check-label" for="field4">Education</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="field5" name="fieldsOfWork[]" value="Entertainment & Arts">
                        <label class="form-check-label" for="field5">Entertainment & Arts</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="field6" name="fieldsOfWork[]" value="Law & Politic">
                        <label class="form-check-label" for="field6">Law & Politic</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="field7" name="fieldsOfWork[]" value="Finance & Consulting">
                        <label class="form-check-label" for="field7">Finance & Consulting</label>
                    </div>
                </div>
    
                <div class="button-register" style="display: flex; justify-content: center">
                    <button type="submit" class="btn btn-primary" style="width: 34.5vw; height: 3rem; background-color:rgb(50, 107, 198); border-color: rgb(50, 107, 198);">Register</button>
                </div>
            </form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>