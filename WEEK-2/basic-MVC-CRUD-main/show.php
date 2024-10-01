<?php
//This file is the show controller

//Load the models file
require("./models/film.php");

//Get the id from the query string e.g. for show.php?id=2, $_GET['id'] has a value of 2
$id = $_GET['id'];

//Get the film from the model
$film = find($id);

//Load the view
require("./views/show.view.php");
