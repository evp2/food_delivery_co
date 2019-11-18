<html>
<head>
    <title>Confirm Order</title>
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
$query = "SELECT o.orderLineItem FROM orders o WHERE o.customer = $id";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc1, $query);



// If the query executed properly proceed
if($response){

    echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>Order Confirmation</b></td>
</tr>';



    $space = "    ";
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
    while($row = mysqli_fetch_array($response)){

        echo '<tr><td align="left">' .
            $row['orderLineItem']. $space .
             '</td><td align="left">' ;

        echo '</tr>';

    }

    echo '</table>';



} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc1);

}

// Close connection to the database
mysqli_close($dbc1);

?>





<form action="http://localhost:1234/delete.php" method="post">


<b>Delete entire order: </b>

<p>
    <input type="submit" name="delete" value="DELETE ENTIRE ORDER" />
</p>

</form>

<form action="http://localhost:1234/pay.php" method="post">


    <b>Pay for Order </b>

    <p>
        <input type="submit" name="pay" value="PAY NOW" />
    </p>

</form>






</body>
</html>