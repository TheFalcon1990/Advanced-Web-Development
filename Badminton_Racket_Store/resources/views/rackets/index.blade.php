<x-layout title="List the Rackets">
    <head>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>

    <div class="seven">
        <h1>Badminton Store</h1>
    </div>

    <!--Message displaying -->

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if ( $rackets->total() == 0 )
        <p>No Rackets Found</p>
    @endif

    <!-- Search Bar -->
    <form method="GET" action="{{ url('/rackets') }}" class="search-form">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search for a racket..." class="search-input" />
        <button type="submit" class="search-button">Search</button>
    </form>

    <div class="racket-list">
        @foreach ($rackets as $racket)
            <div class="racket-item">
                <h2>
                    <a href="/rackets/{{$racket->id}}">
                        {{$racket->title}}
                    </a>
                </h2>
                <p><strong>Company:</strong> {{$racket->company}}</p>
                <p><strong>Year:</strong> {{$racket->year}}</p>
                <p><strong>Level:</strong> {{$racket->level}}</p>
            </div>
        @endforeach
    </div>

    <!-- Display Search Results Count and Pagination -->
    <div class="pagination-info">
        @if(request('search'))
            <p>There are {{ $rackets->total() }} results for "{{ request('search') }}". Page {{ $rackets->currentPage() }} of {{ $rackets->lastPage() }}</p>
        @else
            <p>There are {{ $totalRackets }} rackets available. Page {{ $rackets->currentPage() }} of {{ $rackets->lastPage() }}</p>
        @endif
    </div>

    <!-- Pagination Links -->
        <div class="pagination">
            {{ $rackets->appends(request()->query())->links('vendor.pagination.bootstrap-4') }} <!-- Using Laravel Bootstrap pagination -->
        </div>

</x-layout>