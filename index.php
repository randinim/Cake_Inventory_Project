<?php
require('C:/xampp/htdocs/Cake_Inventory_Project/addProductConfig.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .styled-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  font-family: sans-serif;
  width: 100%;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
  background-color: #dc143c;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.styled-table th,
.styled-table td {
  padding: 12px 15px;
}

.styled-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

/* .styled-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
} */

.styled-table tbody tr:last-of-type {
  border-bottom: 2px solid #dc143c;
}

.styled-table tbody tr.active-row {
  font-weight: bold;
  color: #dc143c;
}



    </style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredients</title>
</head>

<body>

    <div id="pgmain">

        <?php
        if (isset($_GET['message'])) {
            $msg = $_GET['message'];
            $msg = str_replace('%20', ' ', $msg);

            if ($msg == "New Record Created Successfully") {
                echo "<div class='alert success' id='alertDiv'>";
                echo "$msg";
                echo "</div>";
            } else if ($msg == "Record Updated Successfully") {
                echo "<div class='alert success' id='alertDiv'>";
                echo "$msg";
                echo "</div>";
            } else if ($msg = "Record Deleted") {
                echo "<div class='alert danger' id='alertDiv'>";
                echo "$msg";
                echo "</div>";
            }
        }
        ?>

        <h1><span>Products</span> Table View</h1>

        <button class="button buttonAdd"><a href="addProduct.html">Add Product</a></button>

        <table class="styled-table">
            <thead>
                <tr>
                    <td>product Type</td>
                    <td>product Name</td>
                    <td>Unit Price</td>
                    <td>Quantity</td>
                   
                    <td>Update</td>
                    <td>Delete</td>
                </tr>
            </thead>

            <?php
            $sql = "SELECT * FROM ingredients";
            $result = $conn->query($sql);

            echo "<tbody>";
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // print_r($row);
                    // die;
                    echo "<tr>";
                    // echo "<td>" . $row['pType'] . "</td>";
                    echo "<td>" . $row['pName'] . "</td>";
                    echo "<td>" . $row['unitPrice'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "<td>" . $row['expiryDate'] . "</td>";

                    echo "<td>";
                    echo "<button class = 'button buttonEdit'><a href='updateProduct.php?productName=$row[pName]&unitPrice=$row[unitPrice]&quantity=$row[quantity]&'expiryDate=$row[expiryDate]>Update</a></button>";
                    echo "</td>";

                    echo "<td>";
                    echo "<button class = 'button buttonDel'><a id='delete' href='delectProduct.php?id=$row[pId]'>Delete</a></button>";
                    echo "</td>";

                    echo "</tr>";
                }
                echo "</tbody>";
            } else {
                echo "<center>Table is empty!</center>";
            }

            mysqli_close($conn);
            ?>

        </table>
    </div>

    <script>
        // Function to fade out the div
        function fadeOut(element) {
            var op = 1; // initial opacity

            // Timer to decrease opacity gradually
            var timer = setInterval(function() {
                if (op <= 0.1) {
                    clearInterval(timer);
                    element.style.display = 'none'; // Hide the element when faded out
                }

                element.style.opacity = op;
                element.style.filter = 'alpha(opacity=' + op * 100 + ')';
                op -= op * 0.1;
            }, 10); // Decrease opacity every 10ms
        }

        // Fade out the div after 3 seconds (3000 milliseconds)
        setTimeout(function() {
            var myDiv = document.getElementById('alertDiv');
            fadeOut(myDiv);
        }, 3000);
    </script>
</body>

</html>