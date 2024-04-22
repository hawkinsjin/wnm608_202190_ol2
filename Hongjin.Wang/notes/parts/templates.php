<?php



function productListTemplate($r,$o){
	return $r.<<<HTML
	<a class="col-xs-12 col-md-4" href="product_item.php?id=$o->id">
		 <figure class="figure product display-flex flex-column">
		 <div class="flex-stretch">
		 <img src="../notes/images/$o->Thumbnail" alt="">
		 </div>
		 <figcaption class="flex-none">
			 <div>$o->name</div>
			 <div>&dollar;$o->Price</div>
		 </figcaption>
	 </figure>
	 </a>
HTML;
}

function cartListTemplate($r,$o){
return $r.<<<HTML
<div class="display-inline-block">
<div class="flex-none images-thumbs">
	<img src="../notes/images/$o->Thumbnail">
</div>
<div class="flex-stretch">
	<strong>$o->name</strong>
	<div>&dollar;$o->Price</div>
</div>
	<div class="flex-none">
	Delete
</div>
</div>	
HTML;
}