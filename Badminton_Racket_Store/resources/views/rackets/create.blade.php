<x-layout title="Add new Racket">
  <h1>Add a new Racket</h1>

  <form method="POST" action="/rackets" class="racket-form">
    @csrf
    
    <div class="form-group">
      <label for="company">Company:</label>
      <input type="text" id="company" name="company" class="form-control" required/>
    </div>

    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" id="title" name="title" required class="form-control"required />
    </div>

    <div class="form-group">
      <label for="year">Year:</label>
      <input type="number" id="year" name="year" class="form-control" required/>
    </div>

    <div class="form-group">
      <label>Level:</label>
      <div class="radio-group">
        <label for="level-beginner">
          <input type="radio" id="level-beginner" name="level" value="beginner"checked="checked">
          Beginner
        </label>
        <label for="level-amateur">
          <input type="radio" id="level-amateur" name="level" value="amateur">
          Amateur
        </label>
        <label for="level-professional">
          <input type="radio" id="level-professional" name="level" value="professional">
          Professional
        </label>
      </div>
    </div>    

    <div>
      <button type="submit" class="btn-submit">Save the item</button>
    </div>
  </form>
</x-layout>