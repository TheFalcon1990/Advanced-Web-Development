<?php
//This file is the destroy controller
require('./models/film.php');

$id = $_POST['id'];

delete($id);

//Add some code in here to get this to work
header('Location: index.php');
die();