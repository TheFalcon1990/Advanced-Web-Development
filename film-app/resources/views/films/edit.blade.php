<x-layout title="Edit a film">
    <h1>Edit the details for {{$film->title}}</h1>
    <form action="{{ route('films.update', $film->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $film->title) }}">
        </div>
        <div>
            <label for="year">Year:</label>
            <input type="text" id="year" name="year" value="{{ old('year', $film->year) }}">
        </div>
        <div>
            <label for="duration">Duration:</label>
            <input type="text" id="duration" name="duration" value="{{ old('duration', $film->duration) }}">
        </div>
        <div>
            <button type="submit">Save Changes</button>
        </div>
    </form>
</x-layout>