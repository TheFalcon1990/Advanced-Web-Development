<?php
//This file is the store controller

//Load the models file
require("./models/film.php");

//Basic form processing
//Look at the name values of the form controls in create.php to see where these values 
// e.g. $_POST['title'] comes from <input type="text" id="title" name="title">
$title = $_POST['title'];
$year = $_POST['year'];
$duration = $_POST['duration'];

//Ask the model to save the new film
save($title, $year, $duration);

//Redirect the user to the home page
header('Location: ./index.php');
die();
