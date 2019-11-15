<html>
<head>
    <title>Add Order</title>
</head>
<body>
<form action="http://localhost:1234/orderadded.php" method="post">

    <b>Select Your Items</b>

    <p>General Tso Chicken
        <input type="checkbox" name="orderLineItem" size="30" value="select" />
    </p>

    <p>Chicken Wings
        <input type="checkbox" name="orderLineItem" size="30" value="select" />
    </p>

    <p>Fried Dumplings
        <input type="checkbox" name="orderLineItem" size="30" value="select" />
    </p>

    <p>Chicken with Broccoli
        <input type="checkbox" name="orderLineItem" size="30" value="select" />
    </p>

    <p>Sweet and Sour Chicken
        <input type="checkbox" name="orderLineItem size="30" value="select" />
    </p>


    <p>
        <input type="submit" name="submit" value="Send Order" size = "40" />
    </p>

</form>
</body>
</html>
