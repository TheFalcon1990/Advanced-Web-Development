# Basic CRUD Using MVC

This repository demonstrates the use of `require` and functions to build a basic MVC structure for a web application.

- Download this repository and unzip it. Move the folder into your htdocs directory on XAMPP.
- Open the _models/film.php_ file. Change the connection settings in the `getConnection()` function so they match your database.
- In a browser open _index.php_. You should see the list of films. Check that you can also view the details for films and add new films. About, update and delete won't work.

This repository uses exactly the same code as the basic example we looked at previously, we have simply split this code into different files and put some code into functions.

- In a code editor, open _index.php_.
- See how it loads the _film.php_ file from the models folder and calls the `all()` function.
- Now look in _film.php_ and the `all()` function. See how this function calls `getConnection()` to get hold of the database connection, runs a query to select all the films from the database, and finally returns them.
- Now return back to _index.php_, and see how it loads the _index.view.php_ file, which then displays the list of films.

This how MVC works.

- We start with the controller.
- The controller asks the model to perform a task.
- The model completes the task and returns the result to the controller.
- The controller loads a view to display the result for the user.

Have a look at _show.php_. Although we call a different function in the model and we load a different view at the end, it follows the same MVC pattern.

Sometimes, we don't need the model to do anything for us. Have a look at _create.php_. For the initial create action, we don't need any data from the database, we simply need to display a form. In _create.php_ we simply load the view without having to use a model.

> If you need a recap on using functions see these notes [Functions in PHP](functions.md)

## Testing Your Understanding

Can you get the about page, and the update and delete functions to work? Start by trying to get the about page to work first.

- This is going to be very similar to _create.php_.
- Open _about.php_. We don't need a model for the about page, you just need to add code that will load the _about.view.php_ page.
- Check this works.

Next, think about how the update operation works. First, you need to display the form that will allow the user to edit the details for a chosen film. Open _edit.php_. Add some code in here that will:

- Get the id from the query string.
- Call `find()` in the _film.php_ file.
- Load _edit.view.php_.

Check this works.

Next, open _update.php_. Add some code that will:-

- Get the data from the form.
- Call `update()` in the _film.php_ file.
- Re-direct the user back to the _index.php_ page.

Finally, try and get _destroy.php_ to work.

## Removing Duplicate Code From the Views

The different view files contain lots of duplicate code e.g. the header, the navigation bar, the footer. Think how you can re-factor these files so that they use `require` to remove this duplicate code. Once you've done this, your _index.view.php_ file might look something like the following:

```php
<?php
require("./views/header.php");
require("./views/nav.php");

echo "<h1>Here's a list of films</h1>";
// The results from the database are returned as an array
// Use a foreach loop to iterate over the array and display the each film
foreach ($films as $film) {
    echo "<p>";
    // Construct a link to the show.php page e.g. <a href="show.php?id=2">Winter's Bone</a>
    echo "<a href='./index.php?action=show&id={$film["id"]}'>";
    // Display the film's title
    echo $film["title"];
    echo "</a>";
    echo "</p>";
}
require("./views/footer.php");
```
