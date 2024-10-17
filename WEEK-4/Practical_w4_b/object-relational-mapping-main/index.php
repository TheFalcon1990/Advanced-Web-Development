<?php
spl_autoload_register();

use controllers\FilmController;

$filmController =  new FilmController();


$action = "/";
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

//Just for test purposes, so we can see the action.
echo "<p>The action is <strong>{$action}</strong></p>";

//Test the action value and call a function in controllers/filmController.php
if ($action === "/") {
    //Call index() in filmController
    $filmController->index();
} else if ($action === "show") {
    //Call show() in filmController
    $filmController->show();
} else if ($action === "create") {
    //Call create() in filmController
    $filmController->create();
} else if ($action === "about") {
    //Call about() in filmController
    $filmController->about();
} else if ($action === "store") {
    //Call store() in filmController
    $filmController->store();
}
