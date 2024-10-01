<?php
//This file is the edit controller
require('./models/film.php');
$id = $_GET['id'];
$film = find($id);
require('./views/edit.view.php');

//Add some code in here to get this to work
