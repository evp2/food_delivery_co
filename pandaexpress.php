<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

// Create a query for the database
$query = "SELECT m.menuLineItem, m.price FROM Menu m WHERE m.restaurantID = 2";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc1, $query);

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

    echo mysqli_error($dbc1);

}

// Close connection to the database
mysqli_close($dbc1);

?>

<html lang="en">
<head>
    <title>Add Order</title>
</head>
<body>
<form action="http://localhost:1234/orderadded.php" method="post">


    <p>Add Item to Order
        <label>
            <input type="text" name="orderLineItem" size="30" value="" />
        </label>
    </p>



    <p>
        <input type="submit" name="Add" value="Add" />
    </p>

</form>
</body>
</html>
