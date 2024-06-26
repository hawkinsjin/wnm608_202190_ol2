<?php
   include_once "functions.php";

$product = makeQuery(makeConn(),"SELECT * FROM `products`WHERE `id`=".$_GET['id'])[0];

$cart_product = cartItemById($_GET['id']);

?>
<?php include "parts/meta.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Confirmation Page</title>	
</head>
<body>

<?php include "parts/navbar.php";?>

	<div class="container">
		<div class="card soft">
			<h3>You added</h3><h2><?= $product->name ?></h2> 
			<div class="images-thumbs">
				<img src="images/<?=$product->Thumbnail?>" alt="">
				 <h3>to your cart</h3>
			</div>
			<p>There are now <?= $cart_product->amount ?> of <?= $product->name ?>in your cart.</p>

			<div class="display-flex">
				<div class="flex-none"><a href="product_list.php">Continue shopping</a></div>
				<div class="flex-stretch"></div>
				<div class="flex-none"><a href="product_cart.php">Go to cart</a></div>
			</div>
		</div>
	</div>	
</body>
</html>