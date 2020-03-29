<?php

$con = mysqli_connect("localhost", "root", "", "samidata");

    $name = $_POST["Productname"];
    $saleprice = $_POST["Saleprice"];
    $costprice = $_POST["Costprice"];

$sql = "INSERT INTO products(Productname, Saleprice, Costprice) VALUES ('$name', '$saleprice', '$costprice')";

    if (!mysqli_query($con, $sql)) {
            echo "<script type='text/javascript'>alert('Data has not saved);</script>";
    } else {
            echo "<script type='text/javascript'>alert('Data is saved Succesfully');</script>";
    }

?>