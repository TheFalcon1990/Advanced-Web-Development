<x-layout title="List the films">
    <h1>Here's a list of films</h1>
    @auth @foreach ($films as $film)
    <p>
        <a href="/films/{{$film->id}}"> {{$film->title}} </a>
    </p>
    @endforeach @endauth @guest
    <p>
        You need to be logged in to view the content of this website. @endguest
    </p></x-layout
>