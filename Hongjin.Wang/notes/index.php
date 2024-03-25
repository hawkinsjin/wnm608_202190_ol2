<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php 

echo "<div> Hello World <div>";

echo "<div> Goodbye World <div>";

// variables
$a = 5;

echo $a;

//string Interpolation

echo "<div> I have $a things  </div>";
echo '<div> I have $a things  </div>';

//Number 
//Integer

$b = 15;

//

$b = 0.456;

$b = 10;

//string 

$name = "hongjinWANG";

// Boolean
$isOn = true;

// Math
//PEMDAS

echo (5-4)*2;


// Concatenation

echo "<div> b+a"."=c</div>";

echo "<div>$b + $a =".($a+$b)."</div>";

?>
<hr>

<div> This is my name </div>

<div>
	<?php

	$firstname = "Hongjin";
	$Lastname = "Wang";
	$fullname = $firstname." ".$Lastname;
    echo "<div>$fullname</div>";

?>
<hr>
<?php

// supergloabl
//?name = whj & type=textarea



echo "<a href='?name = whj'>visit</a>";

echo "<div> my name is {$_GET['name']} </div>";


echo "<a href='?name = whj&type=textarea'>visit</a>";
echo "<{$_GET['type']}> my name is {$_GET['name']} </{$_GET['type']}>";

?>

<hr>
<?php

// Array

$colors = array("red","green","blue");

echo $colors[2];

echo "
<br>$colors[0]
<br>$colors[1]
<br>$colors[2]
";

echo count($colors);
?>

<div style="color:<?= $colors[1] ?>">
	This text is green
</div>


<hr>
<?php
// Associative Array
$colorAssociative = [
      "red" => "#f00",
      "green" => "#0f0",
      "blue" => "#00f",
];

echo $colorAssociative ['green'];

?>
<hr>
<?php

// casting

$c = "$a";

$d = $c*1;

$colorsObject = (object)$colorAssociative;

// echo $colorsObject;
echo "<hr>";

// Array Index Notation

echo $colors[0]."<br>";
echo $colorAssociative['red']."<br>";
echo $colorAssociative[$colors[0]]."<br>";

// Object Property Notation

echo  $colorsObject -> red."<br>";
echo  $colorsObject -> {$colors[0]}."<br>";

?>

<hr>

<?php

print_r($colors);
echo "<hr>";
print_r($colorAssociative);
echo "<hr>";
echo "<pre>", print_r($colorsObject),"</pre>";


//  Function
function print_p($v) {
	echo "<pre>",print_r($v),"</pre>";
}

print_p($_GET);





?>


</body>
</html>
