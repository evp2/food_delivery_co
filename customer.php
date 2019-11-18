<html>
<head>
    <title> Name Added </title>
</head>
<body>


<?php

session_start();

if(isset($_POST['submit'])){

    $data_missing = array();
//Feel free to add any other attributes needed : address, location or if we need a login screen

    if(empty($_POST['firstName'])){

        // Adds name to array
        $data_missing[] = 'First Name';

    } else {

        // Trim white space from the name and store the name
        $f_name = trim($_POST['firstName']);
        $_SESSION["fname"] = "$f_name";

    }

    if(empty($_POST['lastName'])){

        // Adds name to array
        $data_missing[] = 'Last Name';


    } else {

        // Trim white space from the name and store the name
        $l_name = trim($_POST['lastName']);
        //$_SESSION["lname"] = "$l_name";

    }

    if(empty($_POST['phoneNumber'])){

        // Adds name to array
        $data_missing[] = 'Phone Number';

    } else {

        // Trim white space from the name and store the name
        $phone = trim($_POST['phoneNumber']);
        //$_SESSION["phone"] = "$phone";

    }




    if(empty($data_missing)){

        require_once('../mysqli_connect.php');

        //inserting query : make sure variables match yours
        $query = "INSERT INTO customers (customerid, address, firstName,
        lastName, email, phoneNumber) VALUES (NULL, NULL, ?, ?, NULL, ?)";


        $stmt = mysqli_prepare($dbc1, $query);//just needs to adjust to $dbc



        mysqli_stmt_bind_param($stmt, "ssi", $f_name, $l_name, $phone);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

           // echo 'Name Added!';
            echo' Welcome ' . $f_name .' !';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc1);//same here adjust

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error($dbc1);//adjust dbc

            mysqli_stmt_close($stmt);

            mysqli_close($dbc1);//adjust dbc

        }



    } else {

        echo 'You need to enter the following data<br />';

        foreach($data_missing as $missing){

            echo "$missing<br />";

        }

    }

}

?>


<form action="http://localhost:1234/pickuporder.php" method="post">


    <b>You are now ready to begin placing an order. </b>
    <p> Would you like Pick Up or Delivery? </p>
    <p>
        <input type="submit" name="service" value="PICK UP" size = "40" />
    </p>

</form>

<form action="http://localhost:1234/delivery.php" method = "post">

    <p> <input type = "submit" name= "service" value="DELIVERY" size = "40" /> </p>
</form>





</body>
</html>





