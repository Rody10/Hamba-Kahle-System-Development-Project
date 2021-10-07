<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    $regNum  = $_REQUEST['id'];

    require_once("config.php");

    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE) or 
        die("<p style=\" color: red;\">Couldn't connect to the database, check your credentials!</p>");
    
    $query = "DELETE FROM teamvelox.vehicle WHERE registrationNumber = $regNum";
    $result = mysqli_query($conn, $query) or 
        die("<p style=\" color: red;\> ERROR: Couldn't execute query!</p>");
    
    mysqli_close($conn);

    header("Location: maintainVehicle.php");
    ?>    
</body>
</html>