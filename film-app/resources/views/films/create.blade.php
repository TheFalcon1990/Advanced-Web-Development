<x-layout title="Add new film">
  <h1>Add a new film</h1>

  <form method="POST" action="/films">
    @csrf
    <div>
      <label for="title">Title:</label>
      <input type="text" id="title" name="title" />
    </div>
    <div>
      <label for="year">Year:</label>
      <input type="text" id="year" name="year" />
    </div>
    <div>
      <label for="duration">Duration:</label>
      <input type="text" id="duration" name="duration" />
    </div>
    <div>
      <button type="submit">Save the Film</button>
    </div>

    <div>
      <fieldset>
          <legend>Select a certificate for your film:</legend>
          @foreach ($certificates as $certificate)
          <label for="{{$certificate->name}}">
              <input
                  type="radio"
                  name="certificate_id"
                  id="{{$certificate->name}}"
                  value="{{$certificate->id}}"
              />
              {{$certificate->name}}
          </label>
          @endforeach
      </fieldset>
  </div>
  </form>


</x-layout>