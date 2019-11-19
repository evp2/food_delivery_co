<html>
<head>
    <title>Order</title>
</head>
<body>



<?php
// Get a connection for the database
require_once('./mysqli_connect.php');

// Create a query for the database
$query = "SELECT m.menuLineItem, m.price FROM menu m WHERE m.restaurantID = 4";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>Yellow Submarine Menu</b></td>
</tr>';

    $space = "    ";
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
    while($row = mysqli_fetch_array($response)){

        echo '<tr><td align="left">' .
            $row['menuLineItem']. $space .
           '$', $row['price'] .  '</td><td align="left">' ;

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


<form action="http://localhost:1234/orderaddedyellow.php" method="post">


    <p> Add items to your order </p>
    <p> <input type = "submit" name = "orderLineItem" value = "Curly Fries" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Dock Fries" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Buffalo Chicken Cheese Steak" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Burger" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Pizza Burger" align = "left"/> </p>


</form>
</body>
</html>

