<?php

include_once "../notes/functions.php";

$output = [];

$data = json_decode(file_get_contents("php://input"));

//print_p($data);

switch ($data->type) {
	case "products_all":
	$output['result'] = makequery(makeConn(),"SELECT * FROM `products` ORDER BY `Price`DESC LIMIT 12");
	break;

	case "product_search":
	$output['result'] = makequery(makeConn(),"SELECT * 
	FROM `products`
	WHERE 
	`name` LIKE '%$data->search%' OR
	`Description` LIKE '%$data->search%' OR
	`category` LIKE '%$data->search%' 
	ORDER BY `Price`DESC LIMIT 12");
	break;

	case "product_filter":
	$output['result'] = makequery(makeConn(),"SELECT * 
	FROM `products`
	WHERE 
	`$data->column` LIKE '$data->value'
	ORDER BY `Price`DESC 
	LIMIT 12");
	break;

	case "product_sort":
	$output['result'] = makequery(makeConn(),"SELECT * 
	FROM `products`
	ORDER BY `$data->column` $data->dir
	LIMIT 12");
	break;

}

echo json_encode($output,JSON_NUMERIC_CHECK/JSON_UNESCAPED_UNICODE);