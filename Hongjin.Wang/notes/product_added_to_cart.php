<?php
   include_once "functions.php";

$product = makeQuery(makeConn(),"SELECT * FROM `products`WHERE `id`=".$_GET['id'])[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Confirmation Page</title>	
	<?php include "parts/meta.php";?>
</head>
<body>

<?php include "parts/navbar.php";?>

	<div class="container">
		<div class="card soft">
			<h3>You added </h3><h2><?= $product->name ?></h2> <h3>to your cart</h3>

			<div class="display-flex">
				<div class="flex-none"><a href="product_list.php">Continue shopping</a></div>
				<div class="flex-stretch"></div>
				<div class="flex-none"><a href="product_cart.php">Go to cart</a></div>
			</div>
		</div>
	</div>	
</body>
</html>