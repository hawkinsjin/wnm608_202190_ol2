<?php 
 include "notes/parts/templates.php";
 include "notes/functions.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gaming Force</title>
	<link rel="stylesheet" href="lib/css/styleguide.css">
	<link rel="stylesheet" href="css/storetheme.css">
	<link rel="stylesheet" href="lib/css/gridsystem.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<body>
	
<div class="navbar">
	<div class="container1 display-flex">
		<div class="flex-none">
			<h1>GAME FORCE</h1> 
		</div>
		<!-- nav.nav>ul>li*4>a[href=#article$]>{link $} -->
		<div class="flex-stretch"> </div>
		<nav class="nav nav-pills flex-none" id="navigations">
        	<ul>
        		<li><a href="http://interactive-all.com/landingpage.php">Home</a></li>
        		<li><a href="notes/productlist.php">Store</a></li>
        		<li><a href="http://interactive-all.com/notes/product_cart.php">Cart</a></li>
        		<li><a href="#">Log in</a></li>
        	</ul>
        </nav>
	</div>
	</div>
</div >
<div class="card soft display-flex">
	<div class ="box">
	<ul>
		<div class="card soft top1">
		<li> Gaming mouse Series</li>
		</div>
		<div class="card soft top2">
		<li> Gaming keyboard Series</li>
	    </div>
	    <div class="card soft top3">
		<li> Gaming Monitor Series</li>
		</div>
		<div class="card soft top4">
		<li> Gaming Headset Series</li>
	    </div>
	    <div class="card soft top5">
		<li> Gaming Chair Series</li>
	    </div>
	</ul>
	</div>
	<div class="view1">
		<h1>GAMING FORCE</h1>
	<div class="form-control">
	 <a href="notes/productlist.php">
     <input type="button" class="form-button" value="FOR WIN RIGHT NOW!">
      </a>
    </div>   
</div>
</div>

	<div class="container">
        <div class="maintitle">
		<h2> Latest Mouse </h2>
	    </div>
        <?php
      	recommendedCategory("mouse");?>
               <div class="maintitle">
      	<h2> Latest Keyboards </h2>
        </div>
        <?php 
      	recommendedCategory("Keyboard");
        ?>
	</div>

<footer>
	<div class="bor">
	<nav class="display-flex flex-justify-evenly">
	<div class="column1">
		<h3>Explore</h3>
		<ul>
		    <li><a href="#"><h3>Apps</h3></a></li>
		    <li><a href="#"><h3>Blog</h3></a></li>
		</ul>
	</div>
	<div class="column2">
		<h3>Community</h3>
		<ul>
		    <li><a href="#"><h3>Online communities</h3></a></li>
		    <li><a href="#"><h3>Partnerships</h3></a></li>
		</ul>
	</div>
		<div class="column3">
		<h3>Download</h3>
		<ul>
		    <li><a href="#"><h3>Mac</h3></a></li>
		    <li><a href="#"><h3>Windows</h3></a></li>
		</ul>
	</div>
    </nav>
	</div>
    <div class="copyright">
    	<p>CopyRight@Hongjin Wang</p>
    </div>
</footer>
</body>
</html>