<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "parts/meta.php";?>
	<title>Product Item</title>	
</head>
<body>

	<?php include "parts/navbar.php";?>
	<div class="container">
		<div class="card soft">
			<h2>Product Item</h2>
			<p>This is item # <?= $_GET['id'] ?> </p>
			
		</div>
	</div>
</body>
</html>