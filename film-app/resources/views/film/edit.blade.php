<x-layout title="Edit a film">
    <h1>Edit the details for {{$film->title}}</h1>
    <form action="/films" method="POST">
    @csrf
    @method('PATCH')
    <!--A hidden field contains the id number of the film -->
    <input type="hidden" name="id" value="{{$film->id}}">
    <div>
        <label for="title">Title:</label>
        <!-- The text boxes are populated with values from the database ready for the user to edit -->
        <input type="text" id="title" name="title" value="{{$film->title}}">
    </div>
    <div>
        <label for="year">Year:</label>
        <input type="text" id="year" name="year" value="{{$film->year}}">
    </div>
    <div>
        <label for="duration">Duration:</label>
        <input type="text" id="duration" name="duration" value="{{$film->duration}}">
    </div>
    <div>
        <button type="submit">Save Changes</button>
    </div>
    </form>
</x-layout>