<html>
<head>
    <title>Order</title>
</head>
<body>



<?php
// Get a connection for the database
require_once('./mysqli_connect.php');

// Create a query for the database
$query = "SELECT m.menuLineItem, m.price FROM menu m WHERE m.restaurantID = 9";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>La Cocina Menu</b></td>
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


<form action="http://localhost:1234/orderaddedlacocina.php" method="post">


    <p> Add items to your order </p>
    <p> <input type = "submit" name = "orderLineItem" value = "Maduros Rellenos" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Chicharron de Pollo sin Huesco" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Arroz con Pernil" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Tostones" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Mofongo con carne frita" align = "left"/> </p>


</form>
</body>
</html>
