<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ URL::to('lib/bootstrap/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('bin/css/style.css') }}">
    @yield('addOnCSS')

    <title>SP K-Nearest Neighbor | {{ $titlePage }}</title>
</head>

<body>
    <div class="card" style="height: 100vh;">
        <div class="card-header p-0">
            @include('Guest.Partials.navbar')
        </div>
        @yield('content-wrapper')
        <div class="card-footer bg-white bg-gradient text-success">
            @include('Guest.Partials.footer')
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ URL::to('lib/bootstrap/bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.min.js') }}"></script>
    @yield('addOnJS')
</body>

</html>
