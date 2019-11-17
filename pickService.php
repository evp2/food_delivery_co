<html>
<head>
    <title> Choose Service </title>
</head>
<body>

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
