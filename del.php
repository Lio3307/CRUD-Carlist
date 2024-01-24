<?php

include_once("connection.php");

$idbrg = $_GET['id'];
$result = mysqli_query($conect, "DELETE FROM brg WHERE idbrg =$idbrg");
header("Location:index.php");

?>