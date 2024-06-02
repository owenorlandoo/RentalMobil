<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Login</title>
    <style>
        body, html {
            height: 100%;
        }
        .bg-cover {
            background-image: url('{{ asset('image/CarBackground.png') }}');
            background-size: cover;
            background-position: center;
        }
        .form-container {
            background-color: rgba(108, 117, 125, 0.5); /* bg-secondary with opacity */
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }
        .form-container img {
            width: 100px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="bg-cover d-flex align-items-center justify-content-center">
    <div class="form-container text-white">
        <div class="text-center mb-4">
            <img src="https://www.logo.wine/a/logo/Instagram/Instagram-Glyph-Color-Logo.wine.svg" alt="Logo">
            <h1 class="h3 mb-3 font-weight-normal">Rental Mobil</h1>
            <p>Enter Login Details</p>
        </div>
        
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $item)
                <li>{{$item}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{ old('email')}}" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="d-grid">
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
