<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Checkout Page</title>
	<?php include "parts/meta.php"; ?>
</head>
<body>
	<?php include "parts/navbar.php"; ?>
	<div class="container">
		<div class="card soft">
			<h2>Product Checkout</h2>
         <h3>Adress</h3>
<form>
      <div class="form-control">
      <label for="adress-street" class="form-label">Street</label>
      <input id="adress-street" type="text" placeholder="Street name" class="form-input">
      </div>
      <div class="form-control">
      <div class="grid gap">
           <div class="col-xs-12 col-md-6">
           <label for="adress-city" class="form-label">City</label>
           <input id="adress-city" type="number" placeholder="City name" class="form-input">
           </div>
           <div class="col-xs-12 col-md-6">
           <label for="adress-state" class="form-label">State</label>
           <input id="adress-state" type="number" placeholder="State name" class="form-input">
           </div>
      </div>
      </div>
      <div class="form-control">
      <div class="grid gap">
           <div class="col-xs-12 col-md-6">
           <label for="adress-zip" class="form-label">Zip Code</label>
           <input id="adress-zip" type="number" placeholder="Zip Code" class="form-input">
           </div> 
           <div class="col-xs-12 col-md-6">
           <label for="adress-country" class="form-label">Country</label>
           <input id="adress-country" type="number" placeholder="Country" class="form-input">
      </div>
      </div>    
      </div>
      <h3>Payment</h3>
      <div class="form-control">
      <label for="payment-name" class="form-label">Full Name</label>
      <input id="payment-name" type="text" placeholder="Name" class="form-input">
      </div>
      <div class="form-control">
      <label for="payment-number" class="form-label">Card Number</label>
      <input id="payment-number" type="text" placeholder="####-####-####-####" class="form-input">
      </div>
     <div class="form-control">
        <div class="grid gap">
           <div class="col-xs-12 col-md-6">
           <label for="payment-expiration" class="form-label">Expiration</label>
           <input id="payment-expiration" type="text" placeholder="MM-YY" class="form-input">
           </div> 
           <div class="col-xs-12 col-md-6">
           <label for="payment-cvv" class="form-label">CVV</label>
           <input id="payment-cvv" type="text" placeholder="CVV" class="form-input">
           </div>
        </div>
     </div>
      <div class="form-control">
      <label for="payment-zip" class="form-label">Zip Code</label>
      <input id="payment-zip" type="text" placeholder="Zip Code" class="form-input">
      </div>
      <div class="form-control">
         <a href="product_confirmation.php" class="form-button">Complete Checkout</a>
      </div>
      </form>
		</div>
	</div>	











</body>
</html>