<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link href="{{asset('css/style.css')}}?v={{time()}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('css/navbar.css')}}?v={{time()}}" type="text/css" rel="stylesheet" />
    
</head>
<body>
    <nav>
        <ul>
            <li><a href="/rackets">Home</a></li>
            <li><a href="/rackets/create">Add new rackets</a></li>
            <li><a href="/rackets/about">About</a></li>
        </ul>
    </nav>
    {{$slot}}
</body>
</html>