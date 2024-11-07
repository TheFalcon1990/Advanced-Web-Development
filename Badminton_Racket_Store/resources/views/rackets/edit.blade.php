<x-layout title="Edit product type">
  <div class="edit-racket">
      <h1>Edit the details for {{$racket->title}}</h1>
      <form action="/rackets" method="POST">
          @csrf
          @method('PATCH')
          <!-- A hidden field contains the id number of the racket -->
          <input type="hidden" name="id" value="{{$racket->id}}">
          
          <div>
              <label for="title">Title:</label>
              <input type="text" id="title" name="title" value="{{$racket->title}}">
          </div>

          <div>
              <label for="company">Company:</label>
              <input type="text" id="company" name="company" value="{{$racket->company}}">
          </div>

          <div>
              <label for="year">Year:</label>
              <input type="number" id="year" name="year" value="{{$racket->year}}">
          </div>

          <div>
              <label>Level:</label>
              <label for="level-beginner">
                  <input type="radio" id="level-beginner" name="level" value="beginner"
                  {{ $racket->level == 'beginner' ? 'checked' : '' }}>
                  Beginner
              </label>
              <label for="level-amateur">
                  <input type="radio" id="level-amateur" name="level" value="amateur"
                  {{ $racket->level == 'amateur' ? 'checked' : '' }}>
                  Amateur
              </label>
              <label for="level-professional">
                  <input type="radio" id="level-professional" name="level" value="professional"
                  {{ $racket->level == 'professional' ? 'checked' : '' }}>
                  Professional
              </label>
          </div>

          <div>
              <button type="submit">Save Changes</button>
          </div>
      </form>
  </div>
</x-layout>