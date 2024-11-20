<!DOCTYPE html>
<html>
  <head>
    <title>{{$title}}</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link href="{{asset('css/style.css')}} ?v={{time()}}" type="text/css" rel="stylesheet" />
  </head>
  <body>

@auth
    <div>
        Logged in as {{ Auth::user()->name }}
        <form method='POST' action='/logout'>
            @csrf
            <button type='submit'>Logout</button>
        </form>
    </div>
@endauth

<nav>
  <ul>
      <li><a href="/films">Home</a></li>
      @can('edit')
      <li><a href="/films/create">Add new film</a></li>
      @endcan
      <li><a href="/films/about">About</a></li>
      @guest
      <li><a href="/login">Sign in</a></li>
      @endguest
  </ul>
</nav>

    {{$slot}}
  </body>
</html>