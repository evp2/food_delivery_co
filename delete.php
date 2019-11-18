<html>
<head>
    <title>Delete Order</title>
</head>
<body>




<?php
session_start();
// Get a connection for the database
require_once('../mysqli_connect.php');

$name = $_SESSION["fname"];
$query2 = "SELECT c.customerid FROM customers c WHERE c.firstName = '$name' ";
$response2 = @mysqli_query($dbc1, $query2);
$id = null;
while($row = mysqli_fetch_array($response2)){


    $id = $row['customerid'];

}


// Create a query for the database
$query = "DELETE FROM orders WHERE customer = $id";
$query3 = "DELETE FROM customers WHERE customerid = $id";

// Get a response from the database by sending the connection
// and the query
if (mysqli_query($dbc1, $query)) {
    echo "Order deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($dbc1);
}

//if (mysqli_query($dbc1, $query3)) {
    //echo "Order deleted successfully";
//} else {
  //  echo "Error deleting record: " . mysqli_error($dbc1);
//}

mysqli_close($dbc1);






?>





<form action="http://localhost:1234/pickservice.php" method="post">


    <b>Return to home page</b>

    <p>
        <input type="submit" name="delete" value="HOME" />
    </p>

</form>







</body>
</html>