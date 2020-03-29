<?php

$con = mysqli_connect("localhost", "root", "", "samidata")  or die($con);

    $date = mysqli_real_escape_string($con, $_POST['Date']);
    $new_date = date('Y-m-d',strtotime($date));
    $name = $_POST['Productname'];
    $orders = $_POST['Totalorders'];
    $delivred = $_POST['Totaldelivred'];
    $ads = $_POST['Ads'];

$sql = "INSERT INTO calculator(Datetime, Productname, Totalorders, Totaldelivred, Ads) VALUES ('$new_date', '$name', '$orders', '$delivred', '$ads')";

    if (!mysqli_query($con, $sql)) {
        echo "Data has not saved";
    } else {
        echo "Data is saved Succesfully";
    }

?>