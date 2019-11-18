<html>
<head>
    <title>Pay</title>
</head>
<body>
<form action="http://localhost:1234/paymentreceived.php" method="post">

    <b>Make Payment</b>

    <p>First Name:
        <input type="text" name="firstName" size="30" value="" />
    </p>

    <p>Last Name:
        <input type="text" name="lastName" size="30" value="" />
    </p>

    <p>Card Number:
        <input type="text" name="cardNumber" size="30" value="" />
    </p>

    <p>Expiration Date:
        <input type="text" name="expiration" size="30" value="" />
    </p>

    <p>CVV:
        <input type="text" name="cvv" size="30" value="" />
    </p>


    <p>
        <input type="submit" name="submit" value="Pay Now" />
    </p>

</form>
</body>
</html>