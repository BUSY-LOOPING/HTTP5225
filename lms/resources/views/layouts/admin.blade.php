<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{csrf_token() }} }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        @yield('content')
    </div>
</body>
</html>