<?php

include "../notes/functions.php";
include "../notes/parts/templates.php";

$empty_product = (object)[
   "name"=>"Logitech G502",
   "Price"=>"45.00",
   "Description"=>"The Logitech G502 HERO is a very good mouse for FPS games. It feels very well-built and comfortable to use thanks to its grippy body and right-handed shape with a thumb rest, which also has a sniper button built into it. It has remarkably low click latency and a wide, customizable CPI range. Unfortunately, it may not be the best option for people with small hands.",
   "Quantity"=>"10",
   "category"=>"Mouse",
   "Thumbnail"=>"Mouse_Logitech.jpg",
   "images"=>"Mouse_Logitech.jpg"
];


// LOGIC
try{
	$conn = makePDOConn();
  if (isset($_GET['action'])){
  switch($_GET['action']) {
    case "update":
     $statement = $conn->prepare("UPDATE`products`
     	SET
     	`name`=?,
     	`Price`=?,
     	`Description`=?,
     	`Quantity`=?,
     	`category`=?,
     	`Thumbnail`=?,
     	`images`=?
        WHERE `id`=?
     	");
     $statement->execute([
     	$_POST['product-name'],
     	$_POST['product-Price'],
     	$_POST['product-Description'],
     	$_POST['product-Quantity'],
     	$_POST['product-category'],
     	$_POST['product-Thumbnail'],
     	$_POST['product-images'],
     	$_GET['id']
     ]);
      header("location:{$_SERVER['PHP_SELF']}?id={$_GET['id']}");
      break;
      case "create":
        $statement = $conn->prepare("INSERT INTO`products`
     	(
     	`name`,
     	`Price`,
     	`Description`,
     	`Quantity`,
     	`category`,
     	`Thumbnail`,
     	`images`
     	)
        VALUES (?,?,?,?,?,?,?)
     	");
     $statement->execute([
     	$_POST['product-name'],
     	$_POST['product-Price'],
     	$_POST['product-Description'],
     	$_POST['product-Quantity'],
     	$_POST['product-category'],
     	$_POST['product-Thumbnail'],
     	$_POST['product-images']
     ]);
     $id = $conn->LastInsertId();

      header("location:{$_SERVER['PHP_SELF']}?id=$id");
      break;

      case "delete":
       $statement = $conn->prepare("DELETE FROM `products` WHERE id=?");
       $statement->execute([$_GET['id']]);
      header("location:{$_SERVER['PHP_SELF']}");
      break;
  }
}
} catch(PDOException $e) {
	die($e->getMessage());
}









// templates
function productListItem($r, $o) {
    return $r . <<<HTML
    <div class="card soft">
    <div class="display-flex">
    <div class="flex-none images-thumbs" ><img src="../notes/images/$o->Thumbnail">
    </div>
    <div class="flex-stretch" style="padding:1em"> $o->name</div>
<div class="flex-none"><a href="{$_SERVER['PHP_SELF']}?id=$o->id" class="form-button">Edit</a></div>
</div>
</div>
HTML;
}


function showProductPage($o){
$id = $_GET['id'];
$addorredit = $id == "new" ? "Add" : "Edit";
$createorupdate = $id == "new" ? "create" : "update";
$images = array_reduce(explode(",",$o->images),function($r,$o) { return $r."<img src='../notes/images/$o'>";},'');

$display = <<<HTML
<div>
<h2>Name:$o->name</h2>
<div class="form-control">
<label class="form-label">Price</label>
<span>&dollar;$o->Price</span>
</div>
<div class="form-control">
<label class="form-label">Stock Quantity</label>
<span>$o->Quantity</span>
</div>
<div class="form-control">
<label class="form-label">Category</label>
<span>$o->category</span>
</div>
<div class="form-control">
<label class="form-label">Description</label>
<span>$o->Description</span>
</div>
<div class="form-control">
<label class="form-label">Thumbnail</label>
<span class="images-thumbs"><img src='../notes/images/$o->Thumbnail'></span>
</div>
<div class="form-control">
<label class="form-label">Other images</label>
<span class="images-thumbs">$images</span>
</div>
</div>
HTML;

$form = <<<HDFSFH
<form method="post" action="{$_SERVER['PHP_SELF']}?id=$id&action=$createorupdate">
<h2>$addorredit Product</h2>
   <div class="form-control">
    <label class="form-label" for="product-name">Name</label>
    <input class="form-input" name="product-name" id="product-name"type="text" value="$o->name"placeholder="Enter the Product name">
   </div>
   <div class="form-control">
    <label class="form-label" for="product-Price">Price</label>
    <input class="form-input" name="product-Price" id="product-Price"type="Number" min="0" max="10000" step="0.01" value="$o->Price" placeholder="Enter the Product Price">
   </div>
    <div class="form-control">
    <label class="form-label" for="product-Quantity">Stock Quantity</label>
    <input class="form-input" name="product-Quantity" id="product-Quantity"type="Number" min="0" max="10000" step="1" value="$o->Quantity" placeholder="Enter the Product Stock Quantity">
   </div>
   <div class="form-control">
    <label class="form-label" for="product-category">Category</label>
    <input class="form-input" name="product-category" id="product-category"type="text" value="$o->category"placeholder="Enter the Product category">
   </div>
   <div class="form-control">
    <label class="form-label" for="product-Description">Description</label>
    <textarea class="form-input" name="product-Description" id="product-Description" placeholder="Enter the Product Description">$o->Description</textarea>
   </div>
   <div class="form-control">
    <label class="form-label" for="product-Thumbnail">Thumbnail</label>
    <input class="form-input" name="product-Thumbnail" id="product-Thumbnail" type="text" value="$o->Thumbnail" placeholder="Enter the Product Thumbnail">
   </div>
    <div class="form-control">
    <label class="form-label" for="product-images">Other Images</label>
    <input class="form-input" name="product-images" id="product-images" type="text" value="$o->images" placeholder="Enter the Product Images">
   </div>
    <div class="form-control">
      <input type="submit" class="form-button" value="Update">
    </div>
    </form>
HDFSFH;

$output = $id == "new" ? "<div class='card soft'>$form</div>" :
"<div class='grid gap'>
 <div class='col-xs-12 col-md-5'><div class='card soft'>$display</div></div>
 <div class='col-xs-12 col-md-7'><div class='card soft'>$form</div>
 </div>
 </div>
";

$delete = $id == "new" ? "" : "<a href = '{$_SERVER['PHP_SELF']}?id=$id&action=delete'>Delete</a>";

echo <<<HTML
<div class="card soft">
<nav class="display-flex">
    <div class="flex-stretch">
    <a href="{$_SERVER['PHP_SELF']}">Back</a>
    </div>
    <div class="flex-none">$delete</div>
</nav>
</div>
$output 

HTML;
}







?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product Admin page</title>
  <?php include"../notes/parts/meta.php";?>
</head>
<body>
  <header class="navbar">
    <div class="container display-flex">
      <div class="flex-none">
        <h1>Product Admin</h1>
      </div>
      <div class="flex-stretch"></div>
      <nav class="nav nav-flex flex-none">
          <ul>
            <li><a href="<?= $_SERVER['PHP_SELF']?>">User List</a></li>
             <li><a href="<?= $_SERVER['PHP_SELF']?>?id=new">Add New Product</a></li>
          </ul>
      </nav>
    </div>
  </header>


      <div class="container">
      	<h2> Latest mouse </h2>
      	<?php
      	recommendedCategory("mouse");?>
      	<h2> Latest Keyboards </h2>
      	<?php
      	recommendedCategory("Keyboard");?>
       </div>




  <div class="container">

  	<?php

        if(isset($_GET['id'])){
        	   showProductPage(
        		$_GET['id']=="new" ?
        		$empty_product :
        		makeQuery(makeConn(),"SELECT * FROM `products` WHERE `id`=".$_GET['id'])[0]
        	);
          //showUserProductPage();
        }else{

        ?>

      <h2>Product List</h2>
      <?php

      $result = makeQuery(makeConn(),"SELECT * FROM `products`ORDER BY `Price` DESC");

      echo array_reduce($result,'productListItem');


      ?>
 
<?php }?>

       </div>

</body>








