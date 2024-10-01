<!DOCTYPE HTML>
<html>

<head>
    <title>Show the details for a film</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="css/style.css" type="text/css" rel="stylesheet">
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="create.php">Add new film</a></li>
            <li><a href="about.php">About</a></li>
        </ul>
    </nav>
    <?php
    // Display the film's details. There is a single film, so we don't need a foreach loop
    echo "<h1>{$film['title']}</h1>";
    echo "<p>Year:{$film['year']}</p>";
    echo "<p>Duration:{$film['duration']}</p>";


    // Link to the edit page, passing the film's id in the query string e.g. edit.php?id=3
    echo "<a href='edit.php?id={$film['id']}'><button>Edit</button></a> ";
    ?>

    <!-- For delete we need to use a POST action -->
    <form method='POST' action='destroy.php'>
        <!-- 
A hidden field (not visible to the user) inspect the page or view source in the HTML page to see it. 
The field contains the id number of the film.
-->
        <input type="hidden" name="id" value="<?php echo $film['id']; ?>">
        <button type='submit'>Delete</button>
    </form>

</body>

</html>