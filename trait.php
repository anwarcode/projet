<?php

    $connection =	mysqli_connect('localhost' , 'root' ,'' ,'samidata');
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $productname = $_POST['Productname'];
        $saleprice = $_POST['Saleprice'];
        $costprice = $_POST['Costprice'];


        mysqli_query($connection, "UPDATE products SET Productname = '".$productname."' , Saleprice = '".$saleprice."' , Costprice = '".$costprice."' WHERE id = ".$_POST['id']);

        //  query to update data
        $dbData = mysqli_query($connection,"SELECT * FROM products WHERE id = ".$_POST['id']) or die(mysqli_error());
        $results = mysqli_fetch_assoc($dbData);
        echo json_encode($results);
    }
?>