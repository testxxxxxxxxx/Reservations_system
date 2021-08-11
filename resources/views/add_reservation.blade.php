<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Rezerwacji pokoi</title>
</head>
<body>

    <form name="a" method="get" action="insertCustomers">

        <label for="firstname"> Firstname: </label>
        <input type="text" name="firstname">
        <label for="surname"> Surname: </label>
        <input type="text" name="surname">
        <label for="number_phone"> Number phone: </label>
        <input type="number" name="number_phone">
        <label for="address"> Address: </label>
        <input type="text" name="address">
        <label for="mail_address"> Mail address: </label>
        <input type="text" name="mail_address">
        <label for="from">From: </label>
        <input type="date" name="from">
        <label for="to">To: </label>
        <input type="date" name="to">
        <label for="typeRoom"> Room type: </label>
        <input type="number" name="typeRoom">

        <input type="submit" value="Reservation">     

    </form>
    
</body>
</html>