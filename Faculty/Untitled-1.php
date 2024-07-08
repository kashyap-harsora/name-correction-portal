<?php
 require "Connection_db.php";
  if (isset($_REQUEST['login']))
  {
  
  
    $uname=$_REQUEST['email'];
    $pass1=$_REQUEST['password'];

   /* if(!isset($_SESSION['adminid'])) 
    { 
          session_start(); 
    }*/ 

    $sql="SELECT * FROM faculty_log WHERE email ='".$uname."' and password ='".$pass1."'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_num_rows($res); 
 
    if ($row==1) 
    {

      while($row2 = mysqli_fetch_array($res,MYSQLI_BOTH)) {

      if(!isset($_SESSION['cid'])) 
  { 
          session_start(); 
    } 

    //session variable created and stored in the value.
    $uid = $row2["id"];
    $username = $row2["name"];
      $_SESSION['adminname']=$username;
      $_SESSION['cid']  = $uid;
            
    ?>
  <script type="text/javascript">alert('User Login successfull'); window.location.href="Faculty_profile.php";</script>
    <?php        
        }
      }


    else
    { 
  ?>
    <script type="text/javascript"> alert('Login Error Try again!!'); window.location.href="Faculty_login.php";</script>

  <?php 
  }
  }


?>

<html>
<head>
  <title>Login Form GECG</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <!-- <img src="bg.jpg" > -->
  <div class="wrapper">
    <form action="">
      <h1>Login</h1>
      <div class="input-box">
        <input type="email" name="email" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$
" title="Please enter valid format" placeholder="Username" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box" >
        <input type="password" name="password" id="psw"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="#">Forgot Password</a>
      </div>
      <button type="submit" name="login" class="btn">Login</button>
      <div class="register-link">
        <p>Don't have an account ?  <a href="#">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>