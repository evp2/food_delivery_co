<html>
<head>
    <title>Order</title>
</head>
<body>



<?php
session_start();
// Get a connection for the database
require_once('../mysqli_connect.php');

// Create a query for the database
$query = "SELECT m.menuLineItem, m.price FROM menu m WHERE m.restaurantID = 2";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>Panda Expresss Menu</b></td>
</tr>';

$space = "    ";
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
    while($row = mysqli_fetch_array($response)){

        echo '<tr><td align="left">' .
            $row['menuLineItem']. $space .
            $row['price'] .  '</td><td align="left">' ;

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


<form action="http://localhost:1234/orderaddedpanda.php" method="post">


    <p> Add items to your order </p>
    <p> <input type = "submit" name = "orderLineItem" value = "Side Chow Mein" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Orange Chicken" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Chicken Egg Roll" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Veggie Spring Roll" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Cream Cheese Rangoons" align = "left"/> </p>


</form>
</body>
</html>

