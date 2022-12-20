<?php

function debug(array $data): void
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}


function get_products(): array
{
	global $pdo;
	$res = $pdo->query("SELECT * FROM products");
	return $res->fetchAll();
}



?>