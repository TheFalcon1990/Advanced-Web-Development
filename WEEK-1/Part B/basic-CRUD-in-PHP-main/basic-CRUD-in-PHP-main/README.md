# CRUD Operation using PDO

These examples demonstrate the use of PDO to implement CRUD (Create, Read, Update, Delete) functionality for a simple web application. 
## Getting Started
* Download this repository and unzip it. Move the folder into your htdocs directory on XAMPP.
* The examples use a *films* database table. If you did the *Intro to SQL* practical this table will already be set up. If you didn't you can download the SQL file [films.sql](films.sql) and import this using phpmyadmin. 
* Start with *index.php*. In the PHP code, change the connection settings to match your database. This is the line you need to change
```
    $conn = new PDO('mysql:host=localhost;dbname=MyDatabase', 'MyUsername', 'MyPassword');
```
You will need to change *MyDatabase*, *MyUsername* and *MyPassword* to match your own database name, username and password.
* View *index.php* in a browser. You should see a list of films.
* Have a good look through the code in *index.php*. Make sure you understand what each line of code is doing. Refer to [Form Processing](form-processing.md) and [PHP, Databases and PDO](pdo.md) for explanations.

## Getting the other functions to work
* If you click on one of the links in *index.php*, this takes you to *show.php*, and you'll get an error. Open up *show.php* and edit the connection settings just like you did in *index.php*. The *show.php* page should then work. 
* Continue by changing the connection settings in the other files to get the whole application to work. Make sure you look carefully through the code so you understand how the application has been built.

## Testing your understanding

### Questions
* In *show.php* the details for a single film are shown, how does this page 'know' which film to display i.e. how is data passed from *index.php* to *show.php*?

* *destroy.php* (and *update.php*) also operate on a single film. How do these pages know which film to delete/update e.g. how is data passed from *show.php* to *destroy.php*? How is this different to the way in which data is passed from *index.php* to *show.php*?

* *index.php* uses the ```$conn->query()``` method to execute SQL, why does *show.php* use ```$stmt->execute()```? Why isn't  ```$conn->query()``` used in *show.php*?

### Editing the code
* In *index.php* how can we display the year for the film alongside the title e.g. Jaws (1975)
* How would you edit the code so that the list of films in *index.php* appears in date order with the most recent first. 
* These examples are as simple as they can be. How could you perform some basic user input validation i.e. testing that the user has completed all the fields when adding a new film. Hint: You will need to add some code in *store.php* to test the values from the form. If you detect a problem, ```echo``` out a message to the user and use ```die();``` to prevent the INSERT code from running. 

