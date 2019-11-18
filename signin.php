

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign in</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Order Now</h2>
    <p> Please enter the following before placing your order</p>
    <form action="http://localhost:1234/customer.php">
        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="firstName" class="form-control" id="firstName" placeholder="Enter First Name" name="firstName">
        </div>
        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="lastName" class="form-control" id="lastName" placeholder="Enter Last Name" name="lastName">
        </div>
        <div class="form-group">
            <label for="phoneNumber">Phone Number:</label>
            <input type="phoneNumber" class="form-control" id="phoneNumber" placeholder="Enter Phone Number" name="phoneNumber">
        </div>
        <button type="submit" name = "submit" class="btn btn-default">Enter</button>
    </form>
</div>

</body>
</html>
