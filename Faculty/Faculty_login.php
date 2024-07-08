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

    // //session variable created and stored in the value.
    // $uid = $row2["id"];
    // $username = $row2["Enroll_no"];
    //   $_SESSION['adminname']=$username;
    //   $_SESSION['cid']  = $uid;
            
    ?>

<script type="text/javascript">alert('Login Error Try again'); window.location.href="Faculty_login.php";</script>

    <?php        
        }
      }


    else
    { 
  ?>
  <script type="text/javascript"> alert('Login successfull!!'); window.location.href="Faculty_profile.php";</script>
  
  <?php 
  }
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Faculty Login</title>
<link rel="stylesheet" href="styles.css">
<!-- Add Bootstrap-icons library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: url('images/bg.jpg') no-repeat center center fixed;
    background-size: cover;
    animation: fadeIn 1s ease;
}

.login-container {
    background-color: rgba(255, 255, 255, 0.8);
    padding: 100px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    animation: slideInUp 1s ease;
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

.input-group {
    position: relative;
    width: 100%;
}

.input-group i {
    position: absolute;
    right: 10px;
    top: 10px;
    cursor: pointer;
}
input[type="text" i] {
    padding-block: 1px;
    padding-inline: 2px;
    width: 278px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: border-color 0.3s ease;
}
input[type="email"],
input[type="password"] {
    width: 278px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: border-color 0.3s ease;
}

input[type="email"]:focus,
input[type="password"]:focus {
    outline: none;
    border-color: #007bff;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    border: none;
    border-radius: 4px;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}
</style>
</head>
<body>
<div class="login-container">
    <h2 style="text-align: center; color: #333;">Faculty Login</h2>
    <form id="login-form" method="POST">
        <div class="form-group">
            <label for="username">Email:</label>
            <input type="email"  id="username" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <div class="input-group">
                <input type="password" id="password" name="password" required>
                <i class="fas fa-eye" id="togglePassword"></i>
            </div>
        </div>
        <button type="submit" name="login">Login</button>
    </form>
</div>

<script>
document.getElementById('togglePassword').addEventListener('click', function() {
    var passwordInput = document.getElementById('password');
    var icon = document.getElementById('togglePassword');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
});
</script>

</body>
</html>
