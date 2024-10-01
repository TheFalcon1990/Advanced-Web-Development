<?php
//This file is the index controller

//Load the models file
require("./models/film.php");

//Get all the films from the model
$films = all();

//Load the films view
require("./views/index.view.php");
