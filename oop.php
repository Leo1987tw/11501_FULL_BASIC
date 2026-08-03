<?php

class Animal{
    protected $name;
    public $age;
    public $color;

    function __construct($name, $age, $color){
        $this->name = $name;
        $this->age = $age;
        $this->color = $color;
    }
    
    function getName(){
        return $this->name;
    }
    
    function getInfo(){
        return "Name: " . $this->name . ", Age:" . $this->age . ", Color: " . $this->color;
    }

    function run(){
        return $this->name . " is running.";
    }

    function speed(){
        return $this->name . " is running at a speed of 20 km/h.";
    }

    function setName($name){
        $this -> name = $name;
    }
}

?>

<h3>封裝</h3>

<?php

$dog = new Animal("Buddy", 3, "Brown");

// protected $name 會使得外部抓不到 $name
// echo $dog -> name;
echo $dog->getName();
echo "<br>";
echo $dog->getInfo();
echo "<br>";
echo $dog->run();
echo "<br>";
echo $dog->speed();
$dog -> setName("Max");
echo "<br>";
echo $dog->getName();
echo "<br>";

$cat = new Animal("Amy", 4, "White");

echo $cat->getName();
echo "<br>";
echo $cat->getInfo();
echo "<br>";
echo $cat->run();
echo "<br>";
echo $cat->speed();
$cat -> setName("Min");
echo "<br>";
echo $cat->getName();
echo "<br>";

?>

<h3>繼承</h3>

<?php

class Cat extends Animal{
    function sound(){
        return $this->name . " say Meow!";
    }
    function run(){
        return $this->name . " is running gracefully.";
    }
}

$cat = new Cat("Pinky", 4, "Yellow");

echo $cat->getName();
echo "<br>";
echo $cat->getInfo();
echo "<br>";
echo $cat->run();
echo "<br>";
echo $cat->speed();
$cat -> setName("Min");
echo "<br>";
echo $cat->getName();
echo "<br>";

class Dog extends Animal{
    function sound(){
        return $this->name . " say Woof!";
    }
    function run(){
        return $this->name . " is running energetically.";
    }
} 

$dog = new dog("John", 5, "Red");

echo $dog->getName();
echo "<br>";
echo $dog->getInfo();
echo "<br>";
echo $dog->run();
echo "<br>";
echo $dog->speed();
$dog -> setName("Min");
echo "<br>";
echo $dog->getName();
echo "<br>";

?>

<?php include_once "./db.php";?>