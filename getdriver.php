<?php
require_once('./connect.php');

$query = "SELECT firstName, lastName, email, phoneNumber, driversLicenseInfo FROM drivers";

$response = @mysqli_query($dbc, $query);

if($response){

    echo '<table align="left"
    cellspacing="5" cellpadding="8">
    
    <tr><td align="left"><b>First Name</b></td>
    <td align="left"><b>Last Name</b></td>
    <td align="left"><b>Email</b></td>
    <td align="left"><b>Phone</b></td>
    <td align="left"><b>Drivers L Number</b></td></tr>';
    
    
    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){
    
    echo '<tr><td align="left">' .
    $row['firstName'] . '</td><td align="left">' .
    $row['lastName'] . '</td><td align="left">' .
    $row['email'] . '</td><td align="left">' .
    $row['phoneNumber'] . '</td><td align="left">' .
    $row['driversLicenseInfo'] . '</td><td align="left">';
    
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
