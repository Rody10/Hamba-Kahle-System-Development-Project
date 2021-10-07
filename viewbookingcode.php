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

require_once("config.php");

$connection = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DATABASE)
    or die("strong style=\"color: red;\"> Could not connect to database!</strong>");

$query = "SELECT * FROM teamvelox.booking";

$result = mysqli_query($connection, $query)
    or die("strong style=\"color: red;\"> Could not execute query!</strong>");

    echo "<table width=\"80%\" border=0>
    <td>Client</td>
    <td>Start Date</td>
    <td>End Date</td>
    <td>Destination</td>
    <td>Number of Passengers</td>
    <td>Driver</td>
    </tr>";

while ($row = mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td></td>";
echo "<td>" . $row['clientId'] . "</td>";
echo "<td>" . $row['startDate'] . "</td>";
echo "<td>" . $row['endDate'] . "</td>";
echo "<td>" . $row['Destination'] . "</td>";
echo "<td>" . $row['numberOfPassengers'] . "</td>";
echo "<td>R" . $row['driverId'] . "</td>";
echo "</tr>";
}

echo "</table>";

mysqli_close($connection)

?>

</body>
</html>

