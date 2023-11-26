<?php

require('C:/xampp/htdocs/Cake_Inventory_Project/addProductConfig.php');

$productType = $_POST['pType'];
$productName = $_POST['pName'];
$unitPrice = $_POST['unitPrice'];
$quantity = $_POST['quantity'];
$expireDate = $_POST['expireDate'];

if($productType =='Ingredients'){

    $sql = "INSERT INTO ingredients(pName, unitPrice, quantity, expiryDate) 
    VALUES ('$productName', '$unitPrice', '$quantity','$expireDate')";

}else{
    $sql = "INSERT INTO Accessories(pId, pName, unitPrice, quantity) 
    VALUES ('', '$productName', '$unitPrice', '$quantity')";
}

if (mysqli_query($conn, $sql)) {
    $message = "New Record Created Successfully";
    header("location:index.php?message=". $message);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>