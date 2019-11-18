<html>
<head>
    <title> Name Added </title>
</head>
<body>

<?php
if(isset($_POST['submit'])){
    $data_missing = array();
//Feel free to add any other attributes needed : address, location or if we need a login screen
    if(empty($_POST['firstName'])){
        // Adds name to array
        $data_missing[] = 'First Name';
    } else {
        // Trim white space from the name and store the name
        $f_name = trim($_POST['firstName']);
    }
    if(empty($_POST['lastName'])){
        // Adds name to array
        $data_missing[] = 'Last Name';
    } else {
        // Trim white space from the name and store the name
        $l_name = trim($_POST['lastName']);
    }
    if(empty($_POST['phoneNumber'])){
        // Adds name to array
        $data_missing[] = 'Phone Number';
    } else {
        // Trim white space from the name and store the name
        $phone = trim($_POST['phoneNumber']);
    }
    if(empty($_POST['address'])){
        // Adds name to array
        $data_missing[] = 'Address';
    } else {
        // Trim white space from the name and store the name
        $address = trim($_POST['address']);
    }
    if(empty($_POST['email'])){
        // Adds name to array
        $data_missing[] = 'Email';
    } else {
        // Trim white space from the name and store the name
        $email = trim($_POST['email']);
    }
    if(empty($data_missing)){
        require_once('./connect.php');
        //inserting query : make sure variables match yours
        $query = "INSERT INTO customers(customerid, address, firstName,
        lastName, email, phoneNumber) VALUES (NULL, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($dbc, $query);//just needs to adjust to $dbc
        mysqli_stmt_bind_param($stmt, "ssssi", $address, $f_name, $l_name, $email, $phone);
        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if($affected_rows == 1){
            echo 'Name Added!';
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);//same here adjust
        } else {
            echo 'Error Occurred<br />';
            echo mysqli_error($dbc);//adjust dbc
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);//adjust dbc
        }
    } else {
        echo 'You need to enter the following data<br />';
        foreach($data_missing as $missing){
            echo "$missing<br />";
        }
    }
}
?>

<form action = "http://192.168.64.2/customer.php" method = "post">

    <b> Please enter a name and number for your order: </b>
    <p> First Name: <input type = "text" name = "firstName" value = " "/> </p>

    <p> Last Name:  <input type = "text" name = "lastName" value = " "/> </p>

    <p> Phone Number: <input type = "text" name = "phoneNumber" value = " " /> </p>

    <p> Address: <input type = "text" name = "address" value = " " /></p>

    <p> Email: <input type = "text" name = "email" value = " " /></p>

    <p> <input type = "submit" name = "submit" value = "Enter"/> </p>

</form>

<form action="http://192.168.64.2/pickuporder.php" method="post">


    <b>Would you like Pick Up or Delivery? </b>

    <p>
        <input type="submit" name="service" value="PICK UP" size = "40" />
    </p>

</form>

<form action="http://192.168.64.2/delivery.php" method = "post">

    <p> <input type = "submit" name= "service" value="DELIVERY" size = "40" /> </p>

</form>
</body>
</html>