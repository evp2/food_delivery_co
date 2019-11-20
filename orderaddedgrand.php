<html>
<head>
    <title> Order Added </title>
</head>
<body>


<?php

session_start();


if(isset($_POST['orderLineItem'])){

    $data_missing = array();


    if(empty($_POST['orderLineItem'])){

        // Adds name to array
        $data_missing[] = 'Order Item';

    } else {

        // Trim white space from the name and store the name
        $item = trim($_POST['orderLineItem']);

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




        $query = "INSERT INTO orders (orderid, orderLineItem, orderDate,
        orderTime, customer, restaurantid) VALUES (NULL, ?, CURRENT_DATE , CURRENT_TIME, $id, '1')";


        $stmt = mysqli_prepare($dbc1, $query);



        mysqli_stmt_bind_param($stmt, "s", $item);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Order Added!';

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

<form action="http://localhost:1234/orderaddedgrand.php" method="post">



    <p> Add items to your order </p>
    <p> <input type = "submit" name = "orderLineItem" value = "General Tso Chicken" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Chicken Wings" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Fried Dumplings" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Chicken with Broccoli" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Sweet and Sour Chicken" align = "left"/> </p>






</form>

<form action = "http://localhost:1234/confirm.php" method = "post">

    <p> Please confirm and place your order or select another item to continue adding to your order. </p>
    <p> <input type = "submit" name = "submit" value = "Confirm" /> </p>

</form>
</body>
