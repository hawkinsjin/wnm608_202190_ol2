<?php
include_once "functions.php";
include_once "parts/templates.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php include "parts/meta.php";?>
	<title>product list</title>	
	<script src="../js/functions.js"></script>
	<script src="../js/templates.js"></script>
	<script src="../js/product_list.js"></script>


</head>
<body>
<?php include "parts/navbar.php";?>
	<div class="container">

	<h2>Product List</h2>

	<div class="form-control">
		<form class="hotdog light" id="product-search">
			<input type="search" placeholder="Search Products">
		</form>
	</div>

	<div class="form-control">
		<div class="card soft">
		<div class="display-flex flex-wrap">
		<div class="flex-stretch display-flex">

		
		<div class="flex-none">
			<button data-filter="category" data-value="" type="button"class="form-button">all</button>
		</div>
		<div class="flex-none">
			<button data-filter="category" data-value="mouse" type="button"class="form-button">mouse</button>
		</div>
		<div class="flex-none">
			<button data-filter="category" data-value="monitor" type="button"class="form-button">monitor</button>
		</div>
	</div>
<div class="flex-none">
	<div class="form-select"> 
	   <select class="js-sort">
		 <option value="1"> Least Expensive </option>
		  <option value="2"> Most Expensive </option>
	   </select>
   </div>
   </div>
</div>
</div>
</div>

	<div class='productlist grid gap'>
	</div>


</body>
</html>