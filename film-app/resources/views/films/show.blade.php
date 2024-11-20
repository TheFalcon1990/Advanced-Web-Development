<x-layout title="Show the details for a film">
    <h1>{{ $film->title }}</h1>
    <p>Year: {{ $film->year }}</p>
    <p>Duration: {{ $film->duration }}</p>

    @can('edit')
    <a href="/films/{{ $film->id }}/edit">
        <button>Edit</button>
    </a>

    <form method="POST" action="{{ route('films.destroy', $film->id) }}" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this film?');">Delete</button>
    </form>
    @endcan
</x-layout>