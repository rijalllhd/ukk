<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ini dashboard user</h1>
    <h2>welcome {{ Auth()->user()->username }}</h2>
    <a href="{{route('logout.user')}}">Logout</a>
</body>
</html>