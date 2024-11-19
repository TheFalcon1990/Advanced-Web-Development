<link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet" />

<x-layout title="List the films">
    <h1>Here's a list of films Using Laravel</h1>
    @foreach ($films as $film)
    <p>
        <a href="/films/{{$film->id}}">
            {{$film->title}}
        </a>
    </p>
    @endforeach
</x-layout>