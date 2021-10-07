<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details</title>
</head>

<style>
    *{
       margin: 0;
       padding: 0;
       font-family: sans-serif;
   }
   
   body{
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

   .deets{
    background-color: rgb(0,0,0,0.5);
    color: white;
    width: 400px;
    padding-left: 20px;
    margin-left: 250px;
    padding-top: 10px;
    padding-bottom: 10px;
    line-height: 33px;
   }
   </style>

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
            <button type="button" class="btn"><a href="maintainVehicle.php" style="text-decoration: none; color: black;">BACK</a></button>
        </div>
    </header>

<body>
<h1 style="color: rgb(240, 127, 35); padding-left: 200px; padding-top: 50px; font-size: 45px;">Details</h1>
    <br>
    <?php
    $id = $_REQUEST['id'];

    require_once("config.php");
    
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE) or 
        die("<p style=\" color: red;\">Couldn't connect to the database, check your credentials!</p>");
    
    $query = "SELECT * FROM teamvelox.vehicle where registrationNumber = $id"; 
    
    $result = mysqli_query($conn, $query) or 
        die("<p style=\" color: red;\> ERROR: Couldn't execute query!</p>");
    
    while($row = mysqli_fetch_array($result)){
        echo "<div class=\"deets\">";
        echo "<h3>" . $row['model'] . " " . $row['registrationNumber'] . "</h3>" . "<br>";
        echo "<strong>Car Make: </strong>" . $row['make'] . "<br>"; 
        echo "<strong>Manufactured Year: </strong>" . $row['year'] . "<br>";
        echo "<strong>Passenger Limit: </strong>" . $row['numberOfPassengers'] . "<br>"; 
        echo "<strong>Purchased Date: </strong>" . $row['dateOfPurchase'] . "<br>";  
    }
    echo "</div>";
    mysqli_close($conn);

    ?>

</body>
</html>