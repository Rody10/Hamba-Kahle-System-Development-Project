<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Depots</title>
</head>

<style>
    *{
       margin: 0;
       padding: 0;
       font-family: sans-serif;
   }
   
   .hero{
    height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.4));
    background-position: center;
    background-size: cover;
    overflow-x: hidden;
    position: relative;
 }
   header{
     display: flex;
     width: 90%;
     margin: auto;
     height: 10vh;
     margin: auto;
     align-items: center;
     margin-top: 20px;
 }
 
 .logo-container, .nav-link, .cart{
     display: flex;
 }
 
 .nav-link{
     justify-content: space-between;
     list-style: none;
     display: inline-block;
     padding: 20px 25px;
 }
 
 .nav-link{
   flex: 1;
 }
 
 nav ul{
   margin-right: 50px;
   display: inline;
   
 }
 
 .nav-link a{
     text-decoration: none;
     font-size: 13px;
     color: black;
 }
 
 .nav-link a::after{
   content: '';
   width: 0;
   height: 2px;
   background:  rgb(240, 127, 35);
   display: block;
   margin: auto;
   transition: .5s;
 }
 
 .nav-link a:hover::after{
   width: 100%;
 }
 
 .logo-container{
   width: 135px;
 }
 
 nav{
     padding-right: 100px;
 }
 
 .btn{
       margin-top: 10px;
       padding: 10px 20px;
       border: 0;
       background: rgba(73, 141, 187, 0.938);
       font-weight: bold;
       cursor: pointer;
       margin-left: 950px;
   }
   
   .btn:hover{
       background: rgb(240, 127, 35);
       transition: all 0.3s ease 0s;
   }
   
   .content-table{
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 18px;
    min-width: 1200px;
    margin-left: 350px;
    border-radius: 5px 5px 5px 5px;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
   }
   
   .content-table thead tr{
       background-color: rgba(73, 141, 187, 0.938);
       color: white;
       text-align: left;
        font-weight: bold;
   }

   .content-table th, .content-table td{
        padding: 12px 15px;

   }
   .content-table tbody tr{
       border-bottom: 1px solid #dddddd;
   }

   .content-table tbody tr:nth-of-type(even){
       background-color: #f3f3f3;
   }

   .content-table tbody tr a{
       text-decoration: none;
       color: black;
   }

   .content-table tbody tr a:hover{
       color: rgb(240, 127, 35);
       transition: all 0.3s ease 0s;
   }

   .content-table tbody tr{
    background-color: rgb(0,0,0,0.5);
    color: white;
   }
   .fa{
       font-size: 20px;
       margin-left: 15px;
   }
</style>

<body>
    
<div class="hero"> 
<header>
        <div class="logo-container">
            <img src="images/logo2.png" style="width: 135px;"> 
        </div>
        <nav> 
            <ul>
                <li class="nav-link"><a href='home1.html'></a></li>
                <li class="nav-link"><a href='newabout.html'></a></li>
                <li class="nav-link"><a href='help.html'></a></li>
            </ul>
        </nav>

        <div class="cart">
            <button type="button" class="btn"><a href="admin.php" style="text-decoration: none; color: black;">BACK</a></button>
        </div>
    </header>


    <h1 style="color: rgb(240, 127, 35); padding-left: 200px; padding-top: 50px; font-size: 45px;">Depots</h1>
    <br>

    <?php

    require_once("config.php");

    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE) or 
        die("<p style=\" color: red;\">Couldn't connect to the database, check your credentials!</p>");

    $query = "SELECT depotId, depotName, depotAddress, town, roomsAvailable FROM teamvelox.depot"; 

    $result = mysqli_query($conn, $query) or 
        die("<p style=\" color: red;\> ERROR: Couldn't execute query!</p>");

    echo "<table class=\"content-table\">
    <thead>
     <tr>
            <td>Depot Names</td>
            <td>Details</td>
            <td>Update Rooms</td>
            <td>Delete</td>
            </tr></thead>";

    while($row = mysqli_fetch_array($result)){
        echo "<tbody><tr>";
        echo "<td>" . $row['depotName'] ."</td>";
        echo "<td>" . "<a href =\"depotDetails.php?id=" . $row['depotId'] . "\"> <i class=\"fa fa-file-text-o\" style=\"color: rgba(40, 189, 73, 0.938);\"></i></a>" . "</td>";
        echo "<td>" . "<a href =\"depotUpdate.php?id=" . $row['depotId'] . "\"> <i class=\"fa fa-pencil\" style=\"color: rgba(73, 141, 187, 0.938);\"></i></a>" . "</td>";
        echo "<td>" . "<a href =\"depotDelete.php?id=" . $row['depotId'] . 
        "\" onClick=\"return confirm('Are you sure you want to remove " . strtoupper($row['depotName']) . " " . "with ID".
        strtoupper($row['depotId']) . "?');\"><i class=\"fa fa-times-circle-o\" style=\"color: red;\"></i></a>" . "</td>";
        echo "</tr></tbody>";
    }
    echo "</table>";

    mysqli_close($conn);
    ?>
</body>
</html>