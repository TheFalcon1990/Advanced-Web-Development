<!DOCTYPE html>
<html>
  <head>
    <title>{{$title}}</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link href="{{asset('css/style.css')}} ?v={{time()}}" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <nav>
      <ul>
        <li><a href="/films">Home</a></li>
        <li><a href="/films/create">Add new film</a></li>
        <li><a href="/films/about">About</a></li>
        <li><a href="/certificates">Certificates</a></li>
    </ul>
    </nav>
    {{$slot}}
  </body>
</html>