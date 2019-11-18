<html>
<head>
    <title>ROugh Draft</title>
</head>
<body>
<?php
//debugging
if(isset($_POST['submit'])){

    $data_missing = array();



    if(empty($_POST['orderStatus'])){

        // Adds name to array
        $data_missing[] = 'OrderStatus';

    } else {

        // Trim white space from the name and store the name
        $status = trim($_POST['orderStatus']);

    }


    if(empty($_POST['orderLineItem'])){

        // Adds name to array
        $data_missing[] = 'OrderLineItem';

    } else {

        // Trim white space from the name and store the name
        $item = trim($_POST['orderLineItem']);

    }

    if(empty($_POST['orderLineQuantity'])){

        // Adds name to array
        $data_missing[] = 'OrderQuantity';

    } else {

        // Trim white space from the name and store the name
        $quantity = trim($_POST['orderLineQuantity']);

    }

    if(empty($_POST['orderTotal'])){

        // Adds name to array
        $data_missing[] = 'OrderTotal';

    } else {

        // Trim white space from the name and store the name
        $total = trim($_POST['orderTotal']);

    }


    if(empty($data_missing)){

        require_once('../mysqli_connect.php');

        $query = "INSERT INTO orders (orderid, orderDate, orderTime,
        orderStatus, orderLineItem, orderLineQuantity, orderTotal) VALUES (NULL, NOW(), time(),
        ?, ?, ?, ?)";

        $stmt = mysqli_prepare($dbc1, $query);


        mysqli_stmt_bind_param($stmt, "isssii", $orderid,
             $time, $status, $item,
            $quantity, $total);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Order Sent';

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


<html>
<head>
    <title> Choose Restaurant </title>
</head>
<body>
<form action="http://localhost:1234/addordergrandchina.php" method="post">

    <b>Choose A Restaurant </b>

    <p>
        <input type="submit" name="submit" value="Grand China" size = "40" />
    </p>

</form>

<form action="http:://localhost:1234/pandaexpress.php" method = "post">

    <p> <input type = "submit" name= "submit" value="Panda Express" size = "40" /> </p>
</form>

<form action="http:://localhost:1234/prontopizza.php" method = "post">

    <p> <input type = "submit" name= "submit" value="Pronto Pizza" size = "40" /> </p>
</form>

<form action="http:://localhost:1234/yellowsubmarine.php" method = "post">

    <p> <input type = "submit" name= "submit" value="Yellow Submarine" size = "40" /> </p>
</form>

<form action="http:://localhost:1234/charleys.php" method = "post">

    <p> <input type = "submit" name= "submit" value="Charleys Philly Steaks" size = "40" /> </p>
</form>

<form action="http:://localhost:1234/unos.php" method = "post">

    <p> <input type = "submit" name= "submit" value="Uno's Pizzeria and Grill" size = "40" /> </p>
</form>

<form action="http:://localhost:1234/oldsanjuan.php" method = "post">

    <p> <input type = "submit" name= "submit" value="Old San Juan" size = "40" /> </p>
</form>

<form action="http:://localhost:1234/fiveguys.php" method = "post">

    <p> <input type = "submit" name= "submit" value="Five Guys" size = "40" /> </p>
</form>

<form action="http:://localhost:1234/lacocina.php" method = "post">

    <p> <input type = "submit" name= "submit" value="La Concina" size = "40" /> </p>
</form>

<form action="http:://localhost:1234/palaceofasia.php" method = "post">

    <p> <input type = "submit" name= "submit" value="Palace of Asia" size = "40" /> </p>
</form>

</body>
</html>


