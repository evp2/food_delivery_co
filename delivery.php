<?php
// Get a connection for the database
require_once('./mysqli_connect.php');

// Create a query for the database
$query = "SELECT r.restaurantName FROM restaurant r WHERE r.service LIKE '%Delivery%'";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>Here is where you can order delivery: </b></td>
</tr>';
    echo' 
<form action="http://localhost:1234/deliverymenus.php" method = "post">

    <p> <input type = "submit" name= "submit" value="See Menus" size = "40" /> </p>
</form>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
    while($row = mysqli_fetch_array($response)){

        echo '<tr><td align="left">' .
            $row['restaurantName'] . '</td><td align="left">';

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
