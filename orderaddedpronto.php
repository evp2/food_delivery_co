
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

        require_once('./mysqli_connect.php');

        $name = $_SESSION["fname"];
        $query2 = "SELECT c.customerid FROM customers c WHERE c.firstName = '$name' ";
        $response2 = @mysqli_query($dbc, $query2);
        $id = null;
        while($row = mysqli_fetch_array($response2)){


            $id = $row['customerid'];

        }




        $query = "INSERT INTO orders (orderid, orderLineItem, orderDate,
        orderTime, customer) VALUES (NULL, ?, CURRENT_DATE , CURRENT_TIME, $id)";


        $stmt = mysqli_prepare($dbc, $query);



        mysqli_stmt_bind_param($stmt, "s", $item);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Order Added!';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error($dbc);

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        }

    } else {

        echo 'You need to enter the following data<br />';

        foreach($data_missing as $missing){

            echo "$missing<br />";

        }

    }

}

?>

<form action="http://localhost:1234/orderaddedpronto.php" method="post">


    <p> Add items to your order </p>
    <p> <input type = "submit" name = "orderLineItem" value = "Plain Cheese" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Buffalo Wings" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "French Fries" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Mozzarella Sticks" align = "left"/> </p>

    <p> <input type = "submit" name = "orderLineItem" value = "Pepperoni Pizza" align = "left"/> </p>


</form>

<form action = "http://localhost:1234/confirm.php" method = "post">

    <p> Please confirm and place your order or select another item to continue adding to your order. </p>
    <p> <input type = "submit" name = "submit" value = "Confirm" /> </p>

</form>
</body>
</html>
