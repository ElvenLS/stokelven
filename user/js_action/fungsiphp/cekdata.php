<?php
include "../../php_action/db_connect.php";

$id = $_POST['id'];

$sql = "select productid, name, qty, supplier.suppliername, categories.categories_name from products join supplier on products.supplierid = supplier.supplierid join categories on products.categoryid = categories.categories_id where productid=$id";
$result = mysqli_query($connect, $sql) 
    or die("Error in Selecting " . mysqli_error($connect));
//Membuat array
$identitas = array();
while($row =mysqli_fetch_assoc($result))
{
  $identitas[] = $row;
}
//Menampilkan konversi data pada tabel identitas ke format JSON
echo json_encode($identitas);
//close the db connection
mysqli_close($connect);
?>