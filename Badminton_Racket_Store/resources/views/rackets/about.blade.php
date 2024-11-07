<x-layout title="Welcome to the Badminton Store">
    <h1>We Sell Quality Rackets</h1>

    <p>Welcome to our Badminton Store! We offer a wide selection of high-quality badminton rackets suitable for players of all levels, from beginners to professionals. Our rackets are sourced from reputable brands and are designed to enhance your performance on the court.</p>

    <h2>Our Rackets</h2>
    <div class="racket-gallery">
        <div class="racket-item">
            <img src="{{ asset('css/image/Yonex.jpg') }}" alt="Yonex Racket" />
            <h3>Astro 66</h3>
            <p>Brand: Yonex | Year: 1975 | Level: Beginner</p>
        </div>
        <div class="racket-item">
            <img src="{{ asset('css/image/sonic.jpg') }}" alt="Yonex Racket" />
            <h3>Sonic 55</h3>
            <p>Brand: Li-ning | Year: 2010 | Level: Amateur</p>
        </div>
        <div class="racket-item">
            <img src="{{ asset('css/image/victor.jpg') }}" alt="Yonex Racket" />
            <h3>Xtream Flex</h3>
            <p>Brand: Victor | Year: 1989 | Level: Professional</p>
        </div>


        <style>
            /* About Section Styles */
            .about-section {
                padding: 20px; /* Padding around the about section */
                background-color: #f9f9f9; /* Light background color */
                border-radius: 8px; /* Rounded corners */
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
                margin: 20px; /* Margin around the section */
            }
    
            .about-section h1 {
                font-size: 2.5em; /* Font size for the main heading */
                margin-bottom: 10px; /* Space below the heading */
            }
    
            .about-section p {
                font-size: 1em; /* Font size for paragraph text */
                line-height: 1.5; /* Line height for better readability */
                color: #333; /* Darker text color */
            }
    
            .racket-gallery {
                display: flex; /* Flexbox for layout */
                flex-wrap: wrap; /* Allow items to wrap */
                justify-content: space-around; /* Space items evenly */
                margin-top: 20px; /* Space above gallery */
            }
    
            .racket-item {
                text-align: center; /* Center text in items */
                margin: auto; /* Space around items */
                width: 200px; /* Fixed width for items */
            }
    
            .racket-item img {
                max-width: 100%; /* Responsive image */
                height: auto; /* Maintain aspect ratio */
                border: 1px solid #f60000; /* Border around images */
                border-radius: 5px; /* Rounded corners for images */
            }
        </style>
    
    </div>

    
</x-layout>