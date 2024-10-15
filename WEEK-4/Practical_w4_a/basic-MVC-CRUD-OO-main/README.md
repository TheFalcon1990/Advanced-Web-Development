# A Simple MVC Application

This example demonstrates a simple object oriented MVC application. It is based on the MVC example we looked at previously.

- First, find the file _database/DbConnect.php_ and make changes to the connection settings so they match your database.
- Test the website. You should be able to view and add new films, the edit and delete functionality won't work.

The website has been re-factored to use an object oriented MVC pattern. Take some time to look at the files in the web site.

- It uses a basic front controller pattern, see _index.php_, just like we looked at previously.
- Instead of using a simple functions file for the controller, this now uses a _FilmController_ class, this features methods for each action - `index()`, `show()` etc.
- The functions for working with a database (`all()`, `save()` etc.) have been re-factored into a _FilmModel_ class.
- There is a separate _DbConnect_ class for dealing with the connection to the database.

Consider the 'list all films' action on the homepage.

- In _index.php_ the following conditional statement will be triggered.

```php
if ($action==="/") {
    $filmController->index();
}
```

- The `index()` method of `$filmController` will be called

```php
//FilmController.php
    public function index()
    {
        $films = $this->filmModel->all();
        $this->loadView("index.view", ["films" => $films]);
    }
```

- This method calls the `all()` method from the `FilmModel` class.
- The FilmController then calls the `loadView()` method from the parent class...

```php
//BaseController.php
protected function loadView($view,$data=[])
{
    extract($data);
    require("views/".$view.".php");
}
```

- This then loads the view file.

> One bit of PHP code you probably haven't seen before is the `extract()` function. This function creates a variable for each key in an array e.g.
>
> ```php
> $arr=["msg"=>"hello","active"=>true];
> extract($arr);
> echo $msg; //outputs hello
> ```
>
> It is useful here as it allows us to unpack data and make it easily accessible to the code in a view.

## Testing Your Understanding

Can you get the _edit_, _update_ and _delete_ functionality to work.

You don't need to make any changes to _FilmModel.php_, and the _edit.view.php_ has already been created. You only need to make changes to
_FilmController.php_ so that it uses the model to execute actions and loads the correct views, and _index.php_ to do the routing.

For example, to implement the edit you need to edit the `edit()` method in FrontController. This will need to:-

- Get the id from the query string.
- Call the `find()` method of the FilmModel.
- Load edit.view.php.

And then edit _index.php_ to call this method e.g.

```php
else if ($action === "edit") {
    //Call edit() in filmController
    $filmController->edit();
}
```
