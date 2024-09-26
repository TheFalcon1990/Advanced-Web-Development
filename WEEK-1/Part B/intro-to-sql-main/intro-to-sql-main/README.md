# Introduction to SQL
This practical work covers the basics of using MySQL (MariaDB) and SQL. Make sure you have had a look at the notes on key database concepts [Intro to Databases](intro-to-databases.md) and SQL [Intro to SQL](intro-to-sql.md) before attempting the following.

## Using XAMPP 
MySQL is part of XAMPP. To complete these exercises you will need Apache to be running and MySQL (check your control panel).

* In a web browser enter http://localhost/phpmyadmin/ and you will be taken to admin home screen for phpMyAdmin. It should also be available as the 'admin' link from the control panel.

### Setting up a database
It's a good idea to set up a database where you can do all your work for the module. You will also need to set up a user with access to this database.

* From the navigation bar along the top select 'User accounts'.
* Select 'Add user account' and then enter the following details:
    * Username: cht2520
    * Host name: select 'Local'. It should fill the second field with 'localhost'.
    * Enter a password (and remember it!)
    * Scroll down a bit and select the checkbox that says *'Create database with same name and grant all privileges.'*
    * Scroll down to the bottom of the page and select 'Go'.

A database named cht2520 should appear on the left-hand side.
* Select this database. At the moment it will tell you 'No tables found'

Now go onto *Creating some tables* below.

## Creating tables
* Make sure your cht2520 database is selected.
* Click on the SQL tab, paste in the following code:

```SQL
CREATE TABLE films (
  id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  title varchar(100) NOT NULL,
  year smallint(6) NOT NULL,
  duration smallint(6) NOT NULL,
  CONSTRAINT PRIMARY KEY (id)  
)
```
* Refer back to the notes for an explanation of the SQL statement
* Click 'Go'
* A 'films' table should be created
* Select the table and click 'structure' to check the table you have created


## Inserting data
Select the SQL tab. This allows us to enter SQL commands and execute them.

* Paste in the following:
```SQL
INSERT INTO films (id, title, year, duration) VALUES (NULL, 'Parasite', 2019, 134)
```
* Click 'browse' you should be able to see a new row has been added to the database table
* Click on the SQL tab.
* Write your own INSERT statement to add another film to the table.

## Selecting data
* We are going to need a few more films
* Click on the SQL tab. Paste in the following:
```SQL
INSERT INTO `films` (`id`, `title`, `year`, `duration`) VALUES
(NULL, 'Winter\'s Bone', 2010, 100),
(NULL, 'Do The Right Thing', 1989, 120),
(NULL, 'The Incredibles', 2004, 115),
(NULL, 'The Godfather', 1972, 177),
(NULL, 'Dangerous Minds', 1995, 99),
(NULL, 'Spirited Away', 2001, 124),
(NULL, 'Moonlight', 2016, 111),
(NULL, 'Life of PI', 2012, 127),
(NULL, 'Gravity', 2013, 91),
(NULL, 'Arrival', 2016, 116),
(NULL, 'Wonder Woman', 2017, 141),
(NULL, 'Mean Girls', 2004, 97),
(NULL, 'Inception', 2010, 108),
(NULL, 'Donnie Darko', 2001, 113),
(NULL, 'Get Out', 2017, 117);
```
* Click 'go'
* Select browse to make sure the import worked.
* Select the SQL tab, enter the following.

```SQL
SELECT * FROM films WHERE title="Inception"
```
* Click 'go'. You should see the results of the query.

* Write SELECT statements that will do the following (refer to the notes [Intro to SQL](intro-to-sql.md) to help you):
  * List all the films that were made in 2004
  * List all the films  with a duration of 100 minutes or greater
  * List these films in order, from the longest duration to the shortest
  * List all the films that have a title that contains the word 'the'
  * List all the films that have a title that starts with the word 'the'
  * List all the films that have a title that contains the word 'the' that weren't made in 2004
  
## Deleting data
* Select the SQL tab
* Write an SQL statement to delete a film from the database table.
