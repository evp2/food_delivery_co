<html>
<head>
    <title>Order</title>
</head>
<body>



<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

// Create a query for the database
$query = "SELECT m.menuLineItem, m.price FROM Menu m WHERE m.restaurantID = 3";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc1, $query);

// If the query executed properly proceed
if($response){

    echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>Pronto Pizza Menu</b></td>
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

    echo mysqli_error($dbc1);

}

// Close connection to the database
mysqli_close($dbc1);

?>


<form action="http://localhost:1234/orderaddedpronto.php" method="post">


    <p> Add items to your order </p>
    <p> <input type = "submit" name = "orderLineItem" value = "Plain Cheese" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Buffalo Wings" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "French Fries" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Mozzarella Sticks" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Pepperoni Pizza" align = "left"/> </p>


</form>
</body>
</html>