<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/blueico.ico">
    <title>Update Driver</title>
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
      max-width: 450px;
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

    $query = "SELECT * FROM teamvelox.driver where driverId = $id"; 

    $result = mysqli_query($conn, $query) or 
        die("<p style=\" color: red;\> ERROR: Couldn't execute query!</p>");
    
    while($row = mysqli_fetch_array($result)){
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $contactNumber = $row['contactNumber'];
        $homeTown = $row['homeTown'];
        $driverId = $row['driverId'];
        $licenseCode = $row['licenseCode'];
        
        
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
            <button type="button" class="btn"><a href="maintainDriver.php" style="text-decoration: none; color: black;">BACK</a></button>
        </div>
    </header>

<body>

<div class="form">
        <h2 style="color: rgb(240, 127, 35);">Update <?php echo "$firstName $lastName" . "'s"; ?> Details</h2><br>    
        <form action="changeD.php" method="POST">
<label><strong>First Name:</strong></label><br>
    <input type="text" name="firstName" id="firstName" class="utu" value="<?php echo $firstName; ?>" required><br>
    <label><strong>Last Name:</strong></label><br>
    <input type="text" name="lastName" id="lastName" class="utu" value="<?php echo $lastName; ?>" required><br>
    <label><strong>Contact Number:</strong></label><br>
    <input type="number" name="contactNumber" id="contactNumber" class="utu" value="<?php echo $contactNumber; ?>" required><br>
    <label><strong>Home Address:</strong></label><br>
    <input type="text" name="homeTown" id="homeTown" class="utu" value="<?php echo $homeTown; ?>" required><br>
    <label><strong>License Code:</strong></label><br>
    <input type="text" name="licenseCode" id="licenseCode" class="utu" value="<?php echo $licenseCode; ?>" required><br>
    
    <input type="hidden" name="driverId" id="driverId" class="utu" value="<?php echo $driverId; ?>" required><br>
    <input type="hidden" name="id" value="<?php echo $id ?>"><br>
    <p><input type="submit" name="updateDriver" class="btn2" value="UPDATE DRIVER"></p>
</form>

</div>
  </div>
    
</body>
</html>
