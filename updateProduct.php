<?php
require('../addProductConfig.php');
?>

<?php
if ($_GET['submit']) {
    $productType = $_GET['pType'];
    $productName = $_GET['pName'];
    $unitPrice = $_GET['unitPrice'];
    $quantity = $_GET['quantity'];

    $query = "UPDATE doctor SET
                        ptype = '$productType',
                        pName = '$productName',
                        unitPrice = '$unitPrice',
                        quantity = '$quantity',
                        WHERE pId = '$pId' ";

    $data = mysqli_query($conn, $query);

    if ($data) {
        $message = "Record Updated Successfully";
        header("location:index.php?message=".$message);
    } else {
        echo "<script>alert('Error in Update')</script>";
    }
}

mysqli_close($conn);

?>
