<html>
<head>
    <title>Order</title>
</head>
<body>



<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

// Create a query for the database
$query = "SELECT m.menuLineItem, m.price FROM menu m WHERE m.restaurantID = 5";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>Charleys Philly Steaks Menu</b></td>
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


<form action="http://localhost:1234/orderaddedcharleys.php" method="post">


    <p> Add items to your order </p>
    <p> <input type = "submit" name = "orderLineItem" value = "Cheese Gourmet Fries" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Bacon Cheesesteak" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Philly Cheesesteak" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Chicken California" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Bacon Cheedar Burger" align = "left"/> </p>


</form>
</body>
</html>
