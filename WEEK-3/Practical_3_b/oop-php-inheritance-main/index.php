<!DOCTYPE html>
<html>

<head>
	<title>Inheritance in OOP PHP</title>
</head>

<body>
	<?php

	class ProjectManager
	{
	    protected $contractors;

	    function __construct()
	    {
	        $this->contractors = [];
	    }
	    public function buildHouse()
	    {
			foreach($this->contractors as $contractor){
				echo "<p>{$contractor->work()}</p>";
			}
		}
		public function hireContractor($contractor){
			$this->contractors[] = $contractor;
				}

	    public function payContractors(){
			foreach($this->contractors as $contractor){
				echo "<p>{$contractor->pay()}</p>";
			}
		}
	}

	
	/*
1. Open this page in a browser. You should get the message 'Jane Smith has built the walls'
*/

	/*
2. When you build a house you don't just need builder. Create a Joiner class. The Joiner class will need first name and last name properties and it will need to feature the getFullName() and pay() methods just like in the Builder class. You will also need to add a makeStairs() method. makeStairs() should return a simple string stating the joiner has made some stairs. Uncomment the following code to check this works. 
*/

abstract class Contractor
	{
		protected $firstName;
		protected $lastName;
		function __construct($firstName, $lastName)
		{
			$this->firstName = $firstName;
			$this->lastName = $lastName;
		}
		public function getFullName()
		{
			return "{$this->firstName} {$this->lastName}";
		}
		public function pay()
		{
			return "{$this->getFullName()} just got paid.";
		}
		abstract public function work();
		
	}

	//Builder extends Contractor class

	class Builder extends Contractor
	{
		
		public function work()
		{
			return "{$this->getFullName()} has built the walls.";
		}
		
	}

	//Joiner class extends contractor

class joiner extends Contractor
	{
		public function work()
		{
			return "{$this->getFullName()} has built the kitchen";
		}
	}

	// Electrician class extends Contractor

	class Electrician extends Contractor
	{
		public function work()
		{
			return "{$this->getFullName()} has installed the lights";
		}
	}


	//Plumber class extends contractor

	class Plumber extends Contractor
{
	public function work()
	{
		return "{$this->getFullName()} has fitted a sink";
	}
}
	
/*3. Have a look at  the Builder and Joiner classes. Have a go at creating a parent class called Contractor and have Builder and Joiner 
inherit from Contractor. Make Contractor Abstract (we don't want to create any Contractor instances). 
Think what properties and methods Joiner and Builder have in common. All the previous statements for creating instances should still work.*/


/*4. Create another class, call this class Electrician. It will need to inherit from the Contractor class. Add a fitLighting() method. This method should return a string stating the electrician has fitted the lights. Uncomment the following code to check this works.
*/

	/*
5. Add an abstract method to Contractor, name it work(). Implement the work() method in Builder, Joiner and Electrician classes 
	(replace the existing specific methods e.g. makeStairs()). Again here's some example code. Some of your previous code e.g. 
	$electrician->fitLighting() will now give errors, comment out these lines. 
*/

	$builder = new Builder("Jane", "Smith");
	$joiner = new Joiner("Imran", "Iqbal");
	$electrician = new Electrician("Carla", "Green");
	echo "<p>{$builder->work()}</p>"; //Jane Smith has built some walls. 
	echo "<p>{$joiner->work()}</p>"; //Imran Iqbal has made some stairs. 
	echo "<p>{$electrician->work()}</p>"; //Carla Green has fitted the lights. 


	/*
4. Now uncomment the ProjectManager class. Create an instance of ProjectManager 
(specifying the builder and joiner as arguments when you call the constructor function). 
Test this works by calling the buildHouse and payContractors methods
*/

	$projectManager = new ProjectManager($builder, $joiner,$electrician);
	$projectManager->buildHouse();
	$projectManager->payContractors();
	


	/*
5. Modify the ProjectManager class so that it also uses an Electrician object
*/

	/*
6. One problem is that everytime we create a new kind of Contractor we have to make changes to the ProjectManager class (by adding extra properties, parameters etc.). 
It would be nice if we could add new types of Contractor without changing the ProjectManager class. Have a go at the following:
Remove the $builder, $joiner and $electrician properties from the ProjectManager class.
Replace them with a single $contractors property.
In the constructor function set $contractors to be an empty array i.e. $contractors = [];


Add a hireContractor() method that will allow us to add elements (builder, joiner etc.) to the array e.g.

public function hireContractor($contractor){
	$this->contractors[]=$contractor;
 }

Modify the buildHouse and payContractors methods so that they use forEach loops to call methods of Contractor objects e.g.

foreach($this->contractors as $contractor){
	echo "<p>{$contractor->work()}</p>";
}

Test this works by uncommenting the following code
*/

	$builder = new Builder("Jane","Smith");
	$joiner = new Joiner("Imran","Iqbal");
	$electrician = new Electrician("Carla","Green");
	$plumber = new Plumber("Hussain","Ditta");
	$projectManager = new ProjectManager();
	$projectManager->hireContractor($builder);
	$projectManager->hireContractor($joiner);
	$projectManager->hireContractor($electrician);
	$projectManager->hireContractor($plumber);
	$projectManager->buildHouse();
	$projectManager->payContractors();

	/*
9. Add another child class of Contractor, name it Plumber. The work() method should return a string such as 'plumber has fitted the sink'. Modify the above code so that a plumber is also added to the project. 

Notice how we can  add a plumber and we don't have to make any changes to ProjectManager class.
*/


	?>
</body>

</html>
