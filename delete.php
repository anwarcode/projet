<?php

$connection =	mysqli_connect('localhost' , 'root' ,'' ,'samidata');

$id = $_POST['id'];


//  query to update data

$result  =  mysqli_query($connection, "DELETE FROM products WHERE id = ".$id);
var_dump($result);

?>