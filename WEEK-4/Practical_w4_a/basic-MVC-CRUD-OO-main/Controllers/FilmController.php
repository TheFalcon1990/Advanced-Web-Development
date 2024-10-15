<?php

namespace Controllers;

use Models\FilmModel;

class FilmController extends BaseController
{
    private $filmModel;
    function __construct()
    {
        $this->filmModel = new FilmModel();
    }
    public function index()
    {
        $films = $this->filmModel->all();
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
        $film = $this->filmModel->find($id);
        $this->loadView("show.view", ["film" => $film]);
    }
    function store()
    {
        //get the data from the form
        $title = $_POST['title'];
        $year = $_POST['year'];
        $duration = $_POST['duration'];
        //Ask the model to save the new film
        $this->filmModel->save($title, $year, $duration);
        //Redirect the user to the home page
        header('Location: ./index.php');
    }
    function about()
    {
        $this->loadView("about.view");
    }
    function edit()
    {
        //Add your code in here

        $id = $_GET['id'];

        $film = $this->filmModel->find($id);

        $this->loadView("edit.view" ,["film" => $film]);


    }
    function update()
    {
        //Add your code in here
        $id = $_POST['id'];
        $title = $_POST['title'];
        $year= $_POST['year'];
        $duration = $_POST['duration'];

        // asking to save new film
        $this->filmModel->update($id,$title,$year,$duration);

        // Header

        header('Location: ./index.php');

    }
    function destroy()
    {
        //Add your code in here

        $id = $_POST['id'];
        $this->filmModel->delete($id);
        header('Location: ./index.php');
    }
}
