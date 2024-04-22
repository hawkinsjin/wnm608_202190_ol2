<?php
   include_once "functions.php";
   include_once "parts/templates.php";

$cart = makeQuery(makeConn(),"SELECT * FROM `products` WHERE `id`IN(5,2,12)");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cart Page</title>
	<?php include "parts/meta.php"; ?>
</head>
<body>
	<?php include "parts/navbar.php"; ?>
</body>

	<div class="container ">
			<h2>In Your Cart</h2>
		<div class="grid gap">
			<div class="col-xs-12 col-md-9 ">
				<div class="card soft display-inline-flex">
					<?= array_reduce($cart,'cartListTemplate')?>
				</div>
			</div>
			<div class="col-xs-12 col-md-3">
				<div class="card soft flat ">
					<div class="card-section display-flex">
						<div class="flex-stretch"><strong>Sub Total</strong></div>
						<div class="flex-none">&dollar;3.5</div>
					</div>
						<div class="card-section display-flex">
						<div class="flex-stretch"><strong>Taxes</strong></div>
						<div class="flex-none">&dollar;3.5</div>
					    </div>
					    <div class="card-section display-flex">
						<div class="flex-stretch"><strong>Total</strong></div>
						<div class="flex-none">&dollar;7.0</div>
					    </div>
					    <div class="card-section">
					    	<a href="product_checkout.php" class="form-button">Check Out</a>
					    </div>
					</div>
				</div>
			</div>
		</div>		
</html>