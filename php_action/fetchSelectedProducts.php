<?php 	

require_once 'core.php';

$id = $_POST['productId'];

$sql = "SELECT * FROM products WHERE productid = $id";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);