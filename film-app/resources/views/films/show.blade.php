<x-layout title="Show the details for a film">
    <h1>{{$film->title}}</h1>
    <p>Year:{{$film->year}}</p>
    <p>Duration:{{$film->duration}}</p>

    <a href='/films/{{$film->id}}/edit'>
        <button>Edit</button>
    </a>

    <form method='POST' action='/films'>
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" value="{{$film->id}}">
        <button type='submit'>Delete</button>
    </form>
</x-layout>