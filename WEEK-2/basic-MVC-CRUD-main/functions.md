# Functions

A function is simply group of statements that we give a name to. Here's an example:

```php
function display_details(){
    echo "<ul>";
    echo "<li>Jane Jones</li>";
    echo "<li>19</li>";
    echo "<li>Female</li>";
    echo "</ul>";
}

```

The function name should always describe what the function does e.g. this function, _display_details_, prints someone’s details.

## Calling a function

To run the code in a function we write the name of the function followed by parentheses(curved brackets).

```php
//saved in a file called fncs.php
function display_details(){
    echo "<ul>";
    echo "<li>Jane Jones</li>";
    echo "<li>19</li>";
    echo "<li>IT</li>";
    echo "</ul>";
}
```

Often we store our functions in a separate file, so in this example we load the functions file first and then call the function.

```php
require("fncs.php");
display_details(); //this line of code calls the function
```

This would output

```html
<ul>
  <li>Jane Jones</li>
  <li>19</li>
  <li>IT</li>
</ul>
```

## Arguments and parameters

We can pass data to a function, we do this using an argument.

```php
function display_details($name){
    echo "<ul>";
    echo "<li>$name</li>";
    echo "<li>19</li>";
    echo "<li>IT</li>";
    echo "</ul>";
}
```

```php
require("fncs.php");
display_details("Sarah Smith");
```

Outputs:

```html
<ul>
  <li>Sarah Smith</li>
  <li>19</li>
  <li>IT</li>
</ul>
```

When the function is called, the text 'Sarah Smith' (the argument) is assigned to the variable _$name_ (the parameter).
Arguments allow us to customise a function. The function can produce a different output each time we call it.

```php
function display_details($name){
    echo "<ul>";
    echo "<li>{$name}</li>";
    echo "<li>19</li>";
    echo "<li>Female</li>";
    echo "</ul>";
}
```

```php
require("fncs.php");
display_details("Sarah Smith");
display_details("Sadiah Iqbal");
display_details("Ania Kowalski");

```

Outputs:

```html
<ul>
  <li>Sarah Smith</li>
  <li>19</li>
  <li>IT</li>
</ul>

<ul>
  <li>Sadiah Iqbal</li>
  <li>19</li>
  <li>IT</li>
</ul>

<ul>
  <li>Ania Kowalski</li>
  <li>19</li>
  <li>IT</li>
</ul>
```

### Multiple arguments

We can use several arguments. We separate the arguments and parameters with commas.

```php
function display_details($name, $age, $course){
    echo "<ul>";
    echo "<li>{$name}</li>";
    echo "<li>{$age}</li>";
    echo "<li>{$course}</li>";
    echo "</ul>";
}
```

```php
require("fncs.php");
display_details("Sarah Smith", 21, "Computing in Business");

```

Outputs:

```html
<ul>
  <li>Sarah Smith</li>
  <li>21</li>
  <li>Computing in Business</li>
</ul>
```

### Optional arguments

We can make arguments optional by providing a default value for the parameter. In this example _$course_ is given a default value of "IT".

```php
function display_details($name, $age, $course="IT"){
    echo "<ul>";
    echo "<li>{$name}</li>";
    echo "<li>{$age}</li>";
    echo "<li>{$course}</li>";
    echo "</ul>";
}
```

```php
require("fncs.php");
display_details("Bill Brown",21,"Web Design");
display_details("Sarah Smith",27);
```

In the second function call, a third argument isn't specified so it defaults to _IT_.

```html
<ul>
  <li>Bill Brown</li>
  <li>21</li>
  <li>Web Design</li>
</ul>

<ul>
  <li>Sarah Smith</li>
  <li>27</li>
  <li>IT</li>
</ul>
```

## Type declarations

In recent versions of PHP it is possible to specify the data type of parameters. Here's an example:

```php
function hasPassed(int $mark){
    if($mark>=40){
        echo "Passed";
    }else{
        echo "Failed";
    }
}
```

```php
require("fncs.php");
hasPassed(45);
```

- The keyword _int_ before the parameter _$mark_ specifies mark must be an integer. If the argument is a different data type e.g. a _string_ PHP will throw an error. You can look up the valid types ( including string, array, bool, int) at http://php.net/manual/en/functions.arguments.php.
- It is considered good practice to use type declarations as it makes it clear in your code what type of data to pass to a function.

## Arrays as arguments

We can pass any type of variable as an argument. This example uses an array.

```php
function printArrayAsList(array $arr)
{
    echo "<ul>";
    foreach($arr as $item){
        echo "<li>";
        echo $item;
        echo "</li>";
    }
    echo "</ul>";
}
```

```php
require("fncs.php");
printArrayAsList( ["Sarah","Sadia","Ania","Bill"] );
```

Outputs:

```html
<ul>
  <li>Sarah</li>
  <li>Sadia</li>
  <li>Ania</li>
  <li>Bill</li>
</ul>
```

## Returning values

As well accepting 'input' via parameters functions can also produce 'output'.
They can send data back using a _return_ statement.

```php
function doubleIt(int $num)
{
        $double=$num*2;
        return $double;
}
```

```php
require("fncs.php");
$num = 4;
$numDoubled = doubleIt($num);
echo "{$num} doubled is {$numDoubled}"; //4 doubled is 8
```

The return statement sends a value back to the point in the script the function was called from. In this next example it is used in an _if_ statement.

```php
function old_enough($age)
{
        if($age>=17){
            return true;
        }else{
            return false;
        }
}
```

```php
require("fncs.php");
$age=21;
if(old_enough($age)){
        echo "You're old enough to drive";
}
```

Here's another example that tells us if a file is an image.

```php
function isImage($filename)
{
    $fileExt = substr($filename, strrpos($filename, '.') + 1); //gets the filename extension from the string e.g. png
    if($fileExt==="png" || $fileExt==="jpg" || $fileExt==="jpeg"){
        return true;
    }
    return false;
}
```

```php
require("fncs.php");
var_dump(isImage("test.png")); //true
var_dump(isImage("somefile.jpeg")); //true
var_dump(isImage("anotherfile.php")); //false
var_dump(isImage("anyfile.jpg")); //true

```

Returning values is often a better idea than running echo statements from within a function. It allows the function to be used more flexibly. Here's the example from earlier re-written using a _return_ statement.

```php
function hasPassed(int $mark){
    if($mark>=40){
        return true;
    }else{
        return false;
    }
}
```

```php
require("fncs.php");
if(hasPassed(45)){
    echo "Well done";
}else{
    echo "Hard luck";
}
```

## Returning arrays

We can return any type of data we want. This example returns an array.

```php
function searchCountriesByContinent($searchTerm)
{
    $countries=[
      ["name"=>"Germany", "capital"=>"Berlin", "continent"=>"Europe"],
      ["name"=>"France", "capital"=>"Paris", "continent"=>"Europe"],
      ["name"=>"Japan", "capital"=>"Tokyo", "continent"=>"Asia"],
      ["name"=>"Italy", "capital"=>"Rome", "continent"=>"Europe"]
    ];
    $matches=[];
    foreach($countries as $country){
        if($country["continent"]===$searchTerm){
            $matches[]=$country;
        }
    }
    return $matches;
}
```

```php
require("fncs.php");
$matchingCountries = searchCountriesByContinent("Europe");

foreach($matchingCountries as $country){
    echo "<p>{$countries["name"]}</p>";
}

```

## Variable scope

Variables declared inside a function are only available to that function

```php
function getName(){
    $name="Fred";
    echo $name;
}
```

```php
require("fncs.php");
getName(); //outputs Fred
echo $name; //causes an error : undefined variable
```

- By default variables declared outside a function aren’t available to the function
- We need to declare the variable as _global_ for the function to recognise it

```php
$name="Mike";
function tellMeStuff(){
    global $name; //need to declare as global to access the existing $name variable
    echo $name; //outputs Mike
}
tellMeStuff();
```

- Global variables are often considered bad programming practice as they tie the function to only being used in the presence of the global variables
- Ideally, functions should work independently. They can then be used in any application without changing the code (the principle of 'Loose coupling')
