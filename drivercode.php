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

$query = "SELECT * from teamvelox.driver;"

$result = mysqli_query($connection, $query)
    or die("strong style=\"color: red;\"> Could not execute query!</strong>");

    echo "<table width=\"80%\" border=0>
    <tr>
    <td>Name</td>
    <td>Surname</td>
    <td>Date of Birth</td>
    <td>Contact Number</td>
    <td>Date Employed</td>
    <td>Home Town</td>
    </tr>";

while ($row = mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>" . $row['firstName'] . "</td>";
echo "<td>" . $row['lastName'] . "</td>";
echo "<td>" . $row['dateOfBirth'] . "</td>";
echo "<td>" . $row['contactNumber'] . "</td>";
echo "<td>" . $row['dateEmployed'] . "</td>";
echo "<td>R" . $row['homeTown'] . "</td>";
echo "</tr>";
}
// end table
echo "</table>";

mysqli_close($connection)

?>
  
</body>
</html>

