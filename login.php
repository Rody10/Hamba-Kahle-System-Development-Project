<?php
 if(isset($_POST['username'], $_POST['password'])) 
 {     

     $name = $_POST['username']; 
     $password = $_POST['password']; 
     
     require_once("config.php");
     $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE) or die("Could not connect to database!");
    

     $manager = "M2468";
     $managerP = "abc123";
     $query = mysqli_query($conn, "SELECT username, password FROM details WHERE username = '$name' AND username = '$manager' AND  password =  '$password' AND password = '$managerP'");   
     $rowCheck=mysqli_num_rows($query);
     

     $humanR = "HR246";
     $humanP = "t567";
     $query1 = mysqli_query($conn, "SELECT username, password FROM details WHERE username = '$name' AND username = '$humanR' AND  password =  '$password' AND password = '$humanP'");   
     $rowCheck1=mysqli_num_rows($query1);


     $admin = "Admin24";
     $adminP = "velox2";
     $query2 = mysqli_query($conn, "SELECT username, password FROM details WHERE username = '$name' AND username = '$admin' AND  password =  '$password' AND password = '$adminP'");   
     $rowCheck2=mysqli_num_rows($query2);


     $driver = "D789";
     $driverP = "d567";
     $query3 = mysqli_query($conn, "SELECT username, password FROM details WHERE username = '$name' AND username = '$driver' AND  password =  '$password' AND password = '$driverP'");   
     $rowCheck3=mysqli_num_rows($query3);



     if($rowCheck > 0 )
     { 
         header("Location: managers.php");
     }
     else if($rowCheck1 > 0)
     {
         header("Location: HR.php");
     }
     else if($rowCheck2 > 0)
     {
        header("Location: admin.php");
     }
     else if($rowCheck3 > 0)
     {
        header("Location: driver.php");
     }
     else
     {
         echo 'The username or password are incorrect!';
         header("Location: invalid.html");
     }
}
?>