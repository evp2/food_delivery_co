<html>
<head>
    <title>Add Order</title>
</head>
<body>
<?php
if(isset($_POST['orderLineItem'])){
    $link = mysqli_connect("localhost", "root", "", "DoorDash");
    // echo ( "isset([orderLineItem]): ");
    // echo ( isset($_POST['orderLineItem']) . '<br />');
    // echo ( $_POST['orderLineItem']  . '<br />');
    
    $lineItem = mysqli_real_escape_string($link,$_POST['orderLineItem']);
    
    $query ="SELECT price from menus WHERE menuLineItem='$lineItem';";
    
    $result = mysqli_query($link, $query);
    
    while($row = mysqli_fetch_array($result)) {
        $_POST['orderTotal']=$row['price'];
        $_POST['orderStatus']='Sent';
        $_POST['orderLineQuantity']=1;
    }

    $count = mysqli_affected_rows($link);//Rather than passing $result you actually want to pass the DB link 
    
    // echo ($query . '<br />');
    // echo ($count . '<br />');

    mysqli_close($link);

}
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

        require_once('./connect.php');

        $query = "INSERT INTO orders ( orderDate, orderTime, orderStatus, orderLineItem, orderLineQuantity, orderTotal) VALUES ( CURRENT_DATE(), CURRENT_TIME(), ?, ?, ?, ?)";
        
        //echo ($query);

        $stmt = mysqli_prepare($dbc, $query);

        if ( !$stmt ) {
            die('mysqli error: '. mysqli_error($dbc));
        }

        mysqli_stmt_bind_param($stmt, "ssis", $status, $item, $quantity, $total);
        
        if ( !mysqli_execute($stmt) ) {
            die( 'execute error: '. mysqli_stmt_error($stmt) );
        }


        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Order Sent';

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
<form action="http://192.168.64.2/pandaexpress.php" method="post">

    <b>Select Your Items</b>

    <p>Side Chow Mein
        <input type="checkbox" name="orderLineItem" size="30" value="Side Chow Mein" />
    </p>

    <p>Orange Chicken
        <input type="checkbox" name="orderLineItem" size="30" value="Orange Chicken" />
    </p>

    <p>Chicken Egg Roll
        <input type="checkbox" name="orderLineItem" size="30" value="Chicken Egg Roll" />
    </p>

    <p>Veggie Spring Rolls
        <input type="checkbox" name="orderLineItem" size="30" value="Veggie Spring Rolls" />
    </p>

    <p>Cream Cheese Rangoons
        <input type="checkbox" name="orderLineItem" size="30" value="Cream Cheese Rangoons" />
    </p>


    <p>
        <input type="submit" name="submit" value="Send Order" size = "40" />
    </p>

</form>
</body>
</html>