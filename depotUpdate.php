<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
      margin-top: 30px;
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
    
    .login-page {
      width: 360px;
      padding: 8% 0 0;
      margin: auto;
    }
    .form {
      position: relative;
      z-index: 1;
      background:rgb(0,0,0,0.5);
      max-width: 400px;
      margin: 40px auto 100px;
      padding: 45px;
      text-align: left;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    .utu {
      outline: 0;
      background: #f2f2f2;
      width: 100%;
      border: 0;
      margin: 0 0 15px;
      padding: 8px;
      box-sizing: border-box;
      font-size: 14px;
    }

    label{
        color: white;
    }

    .btn2 {
      outline: 0;
      background:rgba(73, 141, 187, 0.938);
      width: 100%;
      border: 0;
      padding: 15px;
      color: #FFFFFF;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
    }

    .btn2:hover{
      background:rgb(240, 127, 35);   
      transition: all 0.3 ease;                                               
    }


    body {
      background: white;

    }
    </style>

<body>
    <?php

    $id = $_REQUEST['id'];

    require_once("config.php");

    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE) or 
        die("<p style=\" color: red;\">Couldn't connect to the database, check your credentials!</p>");

    $query = "SELECT roomsAvailable, depotName FROM teamvelox.depot where depotId = $id"; 

    $result = mysqli_query($conn, $query) or 
        die("<p style=\" color: red;\> ERROR: Couldn't execute query!</p>");

    while($row = mysqli_fetch_array($result)){
        $depotName = $row['depotName'];
        $roomsAvailable = $row['roomsAvailable'];
    }

    mysqli_close($conn);
    ?>

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
            <button type="button" class="btn"><a href="MaintainDepot.php" style="text-decoration: none; color: black;">BACK</a></button>
        </div>
    </header>

<body>

    <div class="form">
        <h2 style="color: rgb(240, 127, 35);">Update <?php echo "$depotName" . "'s"; ?> Details</h2><br> 
    <form action="changeDepot.php" method="POST">
    <label><strong>Rooms Available:</strong></label><br>
    <input type="number" name="roomsAvailable" id="roomsAvailable" class="utu" value="<?php echo $roomsAvailable ?>" required><br>
    <input type="hidden" name="id" class="utu" value="<?php echo $id ?>"><br>
    <p><input type="submit" name="updateDepot" class="btn2" value="UPDATE ROOMS AVAILABLE"></p>
    </form>

</body>
</html>