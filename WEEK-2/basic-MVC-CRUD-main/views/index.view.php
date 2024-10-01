<!DOCTYPE HTML>
<html>

<head>
    <title>List the films</title>
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
    <h1>Here's a list of films</h1>

    <?php
    // The results from the database are returned as an array
    // Use a foreach loop to iterate over the array and display the each film
    foreach ($films as $film) {
        echo "<p>";
        // Construct a link to the show.php page e.g. <a href="show.php?id=2">Winter's Bone</a>
        echo "<a href='show.php?id={$film["id"]}'>";
        // Display the film's title
        echo $film["title"];
        echo "</a>";
        echo "</p>";
    }
    ?>
</body>

</html>