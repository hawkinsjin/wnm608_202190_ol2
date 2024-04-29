<?php
   include_once "functions.php";

$product = makeQuery(makeConn(),"SELECT * FROM `products`WHERE `id`=".$_GET['id'])[0];

$images = explode(",", $product->images);

$image_elements = array_reduce($images,function($r,$o){
	return $r."<img src='../notes/images/$o'>";
});
//print_p($product);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "parts/meta.php";?>
	<title>Product Item</title>	
	<script src="../lib/js/product_thumbs.js"></script>
</head>
<body>

	<?php include "parts/navbar.php";?>
	<div class="container">
		<div class="grid gap">
			<div class="col-xs-12 col-md-7">
				<div class="card soft">
					<div class="images-main">
					<img src="../notes/images/<?= $product->Thumbnail?>">
				    </div>
				    <div class="images-thumbs">
				    <?= $image_elements ?>
				    </div>
				</div>
			</div>
			<div class="col-xs-12 col-md-5">
				<form class="card soft flat" method="post" action="cart_actions.php?action=add-to-cart">

					<input type="hidden" name="product-id" value="<?= $product->id ?>">

					<div class="card-section">
					<h2 class="product-title"><?= $product->name ?></h2>
					<div class="product-price">&dollar;<?= $product->Price ?></div>
					</div>

					<div class="card-section">
					<div clss="form-control">
						<label for="product-amount" class="form-label">Amount</label>
						<div class="form-select"> 
							<select id="product-amount" name="product-amount">
								<option> 1 </option>
								<option> 2 </option>
								<option> 3 </option>
								<option> 4 </option>
								<option> 5 </option>
								<option> 6 </option>
								<option> 7 </option>
								<option> 8 </option>
								<option> 9 </option>
								<option> 10 </option>
							</select>
						</div>
					</div>

					<div class="form-control">
						<label for="product-color" class="form-label">color</label>
						<div class="form-select"> 
							<select id="product-color" name="product-color">
								<option> Black </option>
								<option> White </option>
							</select>
						</div>
					</div>
				   </div>

				<div class="card-section">
					<input type="submit" class="form-button" value="Add to Cart">	
				</div>
			
				</form>
			</div>
		</div>

		<div class="card soft dark">
			<p><?= $product->Description ?></p>
		</div>



	</div>
</body>
</html>