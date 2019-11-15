<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

// Create a query for the database
$query = "SELECT r.restaurantName FROM Restaurant r WHERE r.service LIKE '%Pick Up%' ";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc1, $query);

// If the query executed properly proceed
if($response){

    echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>Here are the restaurants where you can place an order to Pick Up: </b></td> </tr>';
    echo' 
<form action="http://localhost:1234/pickupmenus.php" method = "post">

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

    echo mysqli_error($dbc1);

}




// Close connection to the database
mysqli_close($dbc1);

?>






