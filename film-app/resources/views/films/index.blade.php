<x-layout title="List the films">
    <h1>Here's a list of films</h1>
    @foreach ($films as $film)
    <p>
        <a href="/films/{{$film->id}}">
            {{$film->title}} ({{$film->certificate->name}})
        </a>
    </p>
    @endforeach
</x-layout>