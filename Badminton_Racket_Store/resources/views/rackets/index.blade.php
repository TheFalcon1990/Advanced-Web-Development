<x-layout title="List the Rackets">
    <head>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>

    <div id="welcome-message" class="welcome-message" style="display: none;">
        <h1>Welcome to the Badminton Store</h1>
    </div>

    <div class="seven">
        <h1>Badminton Store</h1>
    </div>

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

    <!-- Pagination -->
    <div class="pagination">
        <p>Page {{ $rackets->currentPage() }} of {{ $rackets->lastPage() }}</p>
        {{ $rackets->links('vendor.pagination.bootstrap-4') }} <!-- Using Laravel Bootstrap pagination -->
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var welcomeMessage = document.getElementById("welcome-message");

            // Check if the welcome message has already been shown
            if (!localStorage.getItem("welcomeMessageShown")) {
                // Show the message
                welcomeMessage.style.display = "block";
                welcomeMessage.classList.add("show");

                // Hide the message after 5 seconds
                setTimeout(function() {
                    welcomeMessage.classList.remove("show");
                    welcomeMessage.style.display = "none"; // Hide the message
                }, 5000); // 5000 milliseconds = 5 seconds

                // Set the flag in localStorage
                localStorage.setItem("welcomeMessageShown", "true");
            }
        });
    </script>
</x-layout>