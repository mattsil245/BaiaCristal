<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($users as $u)
        <p>{{$u->name}}</p>
        <p>{{$u->email}}</p>
        <p>{{$u->password}}</p>
        <p>{{$u->data_nasc}}</p>
        <p>{{$u->tel}}</p>
        <p>{{$u->status}}</p>
    @endforeach
</body>
</html>