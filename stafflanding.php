<html>
  <head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Landing</title>
    <link rel="stylesheet" href="admin.css">
<link rel="icon" type="image/x-icon" href="images/blueico.ico">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
  .btn{
        margin-top: 10px;
        padding: 10px 20px;
        border: 0;
        background: rgba(73, 141, 187, 0.938);
        font-weight: bold;
        cursor: pointer;
        margin-left: 400px;
        float: right;
    }
    
    .btn:hover{
        background: rgb(240, 127, 35);
        transition: all 0.3s ease 0s;
    }
  </style>

    <body>
<div class="nav-bar">
  <div class="nav-logo">
      <img src="images/logo2.png">
  </div>
  <div class="nav-links">
    <ul>
        
    </ul>
    <button type="button" class="btn"> <a href="home.html" style="text-decoration: none; color: black;">LOG OUT</a></button>
</div>
</div>

  <div class="wrapper">
    <h1>Which Staff Member are You?</h1>
  </div>
  <div class="table">
    <table>
      <tr>
        <td><a href="managers.php"><i class="fa fa-user-o"></i>Manager</a></td>
        <td><a href="admin.php"><i class="fa fa-cog"></i>Admin Staff</a></td>
      </tr>
      <tr>
        <td><a href="HR.php"><i class="fa fa-address-book-o"></i>Human Resources</a></td>
        <td><a href="driver.php"><i class="fa fa-car"></i>Driver</a></td>
      </tr>
    </table>
  </div>
  
</body>
</html>