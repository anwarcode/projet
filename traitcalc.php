<?php

$connection =	mysqli_connect('localhost' , 'root' ,'' ,'samidata');
If(isset($_POST['id'])){

    $id = $_POST['id'];
    $productname = $_POST['Productname'];
    $totalorders = $_POST['Totalorders'];
    $totaldelivred = $_POST['Totaldelivred'];
    $ads = $_POST['Ads'];


    //  query to update data 
     
    mysqli_query($connection, "UPDATE calculator SET Productname = '".$productname."' , Totalorders = '".$totalorders."' , Totaldelivred = '".$totaldelivred."' , Ads = '".$ads."' WHERE id = ".$_POST['id']);

    //  query to update data
    $dbData = mysqli_query($connection,"SELECT * FROM calculator WHERE id = ".$_POST['id']) or die(mysqli_error());
    $results = mysqli_fetch_assoc($dbData);
    echo json_encode($results);
}

?>