<x-layout title="Show the details of all rackets">
    <div class="racket-details">
        <h1>{{$racket->title}}</h1>
        <h2>{{$racket->company}}</h2>
        <p><strong>Year:</strong> {{$racket->year}}</p>
        <p><strong>Level:</strong> {{$racket->level}}</p>

        <div class="button-group">
                <button><a href='/rackets/{{$racket->id}}/edit'>Edit</a></button>

            <form method='POST' action='/rackets' style="display:inline;">

                @csrf

                @method('DELETE')

                <input type="hidden" name="id" value="{{$racket->id}}">

                <button type='submit'>Delete</button>
                
            </form>
        </div>
    </div>
</x-layout>