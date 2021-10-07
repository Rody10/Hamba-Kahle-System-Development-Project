
<?php
$firstName = $_REQUEST['name'];
$lastName = $_REQUEST['surname'];
$contactNumber = $_REQUEST['phoneNumber'];
$startDate = $_REQUEST['startDate'];
$emailAddress = $_REQUEST['email'];
$endDate = $_REQUEST['endDate'];
$noOfPassengers = $_REQUEST['noOfPassengers'];
$departure = $_REQUEST['departure'];
$destination = $_REQUEST['destination'];
$vehicleType = $_REQUEST['vehicleType'];



require_once("config.php");

$connection = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DATABASE)
    or die("<strong style=\"color: red;\"> Could not connect to database!</strong>");

$query = mysqli_query($connection,"SELECT * FROM client WHERE emailAddress = '$emailAddress'");
$rowCheck=mysqli_num_rows($query);

if ($rowCheck>0) 
{ 
  // don't add new client record
}
else
{ // add client record if it does not exist
    $query = mysqli_query($connection,"INSERT INTO client (firstName, lastName, contactNumber, emailAddress)
    VALUES  ('$firstName', '$lastName', '$contactNumber', '$emailAddress')")
        or die("<strong style=\"color: red;\"> Could not execute query!</strong>");
    
}
$clientID = mysqli_query($connection,"SELECT clientID FROM client WHERE emailAddress = '$emailAddress'"); // obtain clientID to be used as a foreign key

$row = mysqli_fetch_array($clientID);
$ID = $row[0];

$query = mysqli_query($connection,"INSERT INTO booking (startDate, endDate, numberOfPassengers, driverID, clientID, departure, destination, vehicleType) 
    VALUES('$startDate', '$endDate', '$noOfPassengers',null , '$ID', '$departure', '$destination', '$vehicleType')")          
     or die("<strong style=\"color: red;\"> Could not execute query!</strong>"); // insert data into booking table .... there is a problem i line up.

     mysqli_close($connection);

echo "<!DOCTYPE html>
<html>
  <head>
<meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Success</title>
<link rel='icon' type='image/x-icon' href='images/blueico.ico'>
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>

<style>
  body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    color: black;
    height: 100vh;
      background-image: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.6)), url(images/transportation.jpg);
      background-position: center;
      background-size: cover;
      overflow-x: hidden;
      position: relative;
  }

  .hero{
    height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.6)), url(images/slideshow5.jpg);
    background-position: center;
    background-size: cover;
    overflow-x: hidden;
    position: relative;
}

.main{
  width: 800px;
  background-color: rgb(0,0,0,0.5);
  margin: auto;
  margin-top: 20px;
  color: #ffffff;
  border-radius: 15px 15px 15px 15px;
}   

  .centre, .content{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .content{
    width: 400px;
    height: 350px;
    background: white;
    border-radius: 3px;
    box-shadow: 0 2px 12px 0 rgba(0, 0, 0, .4);
  }

  .headings{
    height: 68px;
    background: rgba(73, 141, 187, 0.938);
    overflow: hidden;
    border-radius: 3px 3px 0 0;
    box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .2);
  }

  .headings h2{
    color: white;
    padding-left: 14px;
    font-weight: normal;
  }

  .fa-times{
    position: absolute;
    right: 20px;
    top: 20px;
    color: #e8f7fc;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
  }

  .fa-check{
    font-size: 50px;
    color: rgba(73, 141, 187, 0.938);
    font-weight: bold;
    height: 80px;
    width: 80px;
    border: 2px solid rgba(73, 141, 187, 0.938);
    text-align: center;
    padding-top: 13px;
    border-radius: 50%;
    box-sizing: border-box;
    margin: 30px 0 0 160px;
  }

  p{
    padding-top: 10px;
    font-size: 19px;
    color: #1a1a1a;
    text-align: center;
  }

  .line{
    position: absolute;
    bottom: 60px;
    width: 100%;
    height: 1px;
    background: silver;
  }

  .close-btn{
    position: absolute;
    bottom: 12px;
    right: 25px;
    border: 1px solid rgba(73, 141, 187, 0.938);
    border-radius: 3px;
    color:rgba(73, 141, 187, 0.938);
    padding: 8px 10px;
    font-size: 18px;
    cursor: pointer;
    background: rgba(73, 141, 187, 0.938)
  }

  .close-btn:hover{
    background:  rgb(240, 127, 35);
    border: 1px solid rgb(240, 127, 35);
    color: white;
    transition: 0.5s;
  }
</style>

<body>
<div class='main'>
    <div class='center'>
      <div class='content'>
        <div class='headings'>
          <h2>Success!</h2>
          
        </div>
        <label for='click' class='fa fa-check'></label>
        <p>Your booking has been successfully made.</p>
        <div class='line'></div>
        <button for='click' class='close-btn'><a href='home.html' style='text-decoration: none; color: white;'>Close</a></button>
      </div>
    </div> 
    </div> 
</body>

</html>"




?>



