<html>
<head>
    <title>Order</title>
</head>
<body>



<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

// Create a query for the database
$query = "SELECT m.menuLineItem, m.price FROM menu m WHERE m.restaurantID = 1";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>Grand China Menu</b></td>
</tr>';

    $space = "    ";
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
    while($row = mysqli_fetch_array($response)){

        echo '<tr><td align="left">' .
            $row['menuLineItem']. $space .
           '$', $row['price'] . '</td><td align="left">' ;


        echo '</tr>';

    }

    echo '</table>';



} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);

?>


<form action="http://localhost:1234/orderaddedgrandchina.php" method="post">


    <p> Add items to your order </p>
    <p> <input type = "submit" name = "orderLineItem" value = "General Tso Chicken" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Chicken Wings" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Fried Dumplings" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Chicken with Broccoli" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Sweet and Sour Chicken" align = "left"/> </p>


</form>
</body>
</html>
