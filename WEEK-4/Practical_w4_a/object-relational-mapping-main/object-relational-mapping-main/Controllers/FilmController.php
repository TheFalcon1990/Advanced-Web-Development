<?php

namespace Controllers;

use Models\ActiveRecord\Film;

class FilmController extends BaseController
{
	function __construct() {}
	public function index()
	{
		//Get all the films from the model
		$films = Film::all();
		$this->loadView("index.view", ["films" => $films]);
	}
	function create()
	{
		$this->loadView("create.view");
	}
	function show()
	{
		//Get the id from the query string e.g. for show.php?id=2, $_GET['id'] has a value of 2
		$id = $_GET['id'];
		//Get the film from the model
		$film = Film::find($id);
		$this->loadView("show.view", ["film" => $film]);
	}
	function about()
	{
		$this->loadView("about.view");
	}
	function store()
	{
		//get the data from the form
		$title = $_POST['title'];
		$year = $_POST['year'];
		$duration = $_POST['duration'];
		//Ask the model to save the new film
		$film = new Film($title, $year, $duration);
		$film->save();
		//Redirect the user to the home page
		header('Location: ./index.php');
	}
	function edit()
	{
		//Get the id from the query string e.g. for show.php?id=2, $_GET['id'] has a value of 2
		$id = $_GET['id'];
		//Get the specific film from the model
		$film = Film::find($id);
		$this->loadView("edit.view", ["film" => $film]);
	}
	function update()
	{
		//get the data from the form
		$id = $_POST['id'];
		$title = $_POST['title'];
		$year = $_POST['year'];
		$duration = $_POST['duration'];
		//Find the film
		$film = Film::find($id);
		//Update the film's properties
		$film->title =  $title;
		$film->year =  $year;
		$film->duration =  $duration;
		//Save the film
		$film->save();
		//Redirect the user to the home page
		header('Location: ./index.php');
	}
	function destroy()
	{
		$id = $_POST['id'];
		//Find the film
		$film = Film::find($id);
		//Delete the film
		$film->delete();
		//Redirect the user to the home page
		header('Location: ./index.php');
	}
}