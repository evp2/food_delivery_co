<html>
<head>
    <title> Choose Service </title>
</head>
<body>

<form action = "http://localhost:1234/customer.php" method = "post">

<b> Please enter a name and number for your order: </b>
<p> First Name: <input type = "text" name = "firstName" value = " "/> </p>

<p> Last Name:  <input type = "text" name = "lastName" value = " "/> </p>

    <p> Phone Number: <input type = "text" name = "phoneNumber" value = " " /> </p>

    <p> <input type = "submit" name = "submit" value = "Enter"/> </p>

<p>                  </p>

</form>

<form action="http://localhost:1234/pickuporder.php" method="post">


    <b>Would you like Pick Up or Delivery? </b>

    <p>
        <input type="submit" name="service" value="PICK UP" size = "40" />
    </p>

</form>

<form action="http://localhost:1234/delivery.php" method = "post">

    <p> <input type = "submit" name= "service" value="DELIVERY" size = "40" /> </p>
</form>





</body>
</html>
