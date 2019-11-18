
<html>
<head>
    <title> Payment Received </title>
</head>
<body>


<?php

session_start();


if(isset($_POST['submit'])){

    $data_missing = array();


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

    if(empty($_POST['cardNumber'])){

        // Adds name to array
        $data_missing[] = 'Card Number';

    } else {

        // Trim white space from the name and store the name
        $card = trim($_POST['cardNumber']);

    }

    if(empty($_POST['expiration'])){

        // Adds name to array
        $data_missing[] = 'Expiration Date';

    } else {

        // Trim white space from the name and store the name
        $exp = trim($_POST['expiration']);

    }

    if(empty($_POST['cvv'])){

        // Adds name to array
        $data_missing[] = 'CVV Number';

    } else {

        // Trim white space from the name and store the name
        $cvv = trim($_POST['cvv']);

    }



    if(empty($data_missing)){

        require_once('../mysqli_connect.php');

        $name = $_SESSION["fname"];
        $query2 = "SELECT c.customerid FROM customers c WHERE c.firstName = '$name' ";
        $response2 = @mysqli_query($dbc1, $query2);
        $id = null;
        while($row = mysqli_fetch_array($response2)){


            $id = $row['customerid'];

        }




        $query = "INSERT INTO payments (cardNumber, expiration, cvv,
        firstName, lastName, customerid) VALUES (?, ?, ?, ?, ?, $id)";


        $stmt = mysqli_prepare($dbc1, $query);



        mysqli_stmt_bind_param($stmt, "ssiss", $card, $exp, $cvv, $f_name, $l_name);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Payment Received!';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc1);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error($dbc1);

            mysqli_stmt_close($stmt);

            mysqli_close($dbc1);

        }

    } else {

        echo 'You need to enter the following data<br />';

        foreach($data_missing as $missing){

            echo "$missing<br />";

        }

    }

}

?>

<form action="http://localhost:1234/pickservice.php" method="post">


    <p> Thank you for your payment!</p>
<p> Your order will be ready soon! </p>
    <p> <input type = "submit" name = "orderLineItem" value = "Return Home" align = "left"/> </p>






</form>


</body>
</html>