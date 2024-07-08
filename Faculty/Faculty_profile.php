
<?php 

require "Connection_db.php";


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT * FROM faculty_log ";
$sql1="SELECT * FROM correction_rqt ";

$result= mysqli_query($conn,$sql);
$res= mysqli_query($conn,$sql1);

if(isset($_REQUEST['preview']))
{        
 $Preview_sql="SELECT pro_image  FROM correction_rqt where Rid='".$_REQUEST['preview']."'";

 $Preview_result=mysqli_query($conn,$Preview_sql);
 

          
        }


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Page</title>
    <link rel="stylesheet" href="homepage.css">
    <style>
        body, html {
    margin: 0;
    padding: 0;
    height: 100%;
}

body {
    background-color: #f5f5f5;
}

.header {
    background-color: #4f16f8;
    padding: 20px;
}

.header h1 {
    margin: 0;
}

.header nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

.header nav ul li {
    display: inline;
    margin-right: 20px;
}

.header nav ul li a {
    color: #000;
    text-decoration: none;
}

.faculty-container {
    display: flex;

 
    margin-top: 30px;
    position: relative;
    
   
    margin-right: 206px;
}

.faculty {
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: calc(40% - 26px);
    height: 106px;
    padding: 20px;
    margin-bottom: 20px; /* Adjust as needed */
    display: flex;
    align-items: center;
    min-height: 50%;
    margin-left:50px;
    margin-right:50px;
    margin-bottom:50px;
    border-radius: 12px;
}

.faculty-img {
    width: 137px;
    height: 131px;
    border-radius: 50%;
    margin-right: 20px;
}

.text {
    flex: 1;
    font-size: large;
    
}

.text h2 {
    margin-top: 0;
}

.text p {
    margin: 5px 0;
}

.footer {
    background-color: #ffffff;
    padding: 20px;
    text-align: center;
}
nav {
    
    padding: 10px 20px;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: #ffffff;
    text-decoration: none;
    font-size: 15px;
}

nav ul li a:hover {
    color: #ffffff;
    text-decoration: underline;
}
.class-name:after {
    content: " ";
    display: block;
    border-bottom: 0.5px solid #9E9E9E;
}

table {
            width: 80%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            margin: 5px;
        }
        th, td {
            padding: 4px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #ffbaba;
        }
        .center {
            text-align: center;
        }

    </style>
  
</head>
<body>
   <?php while($row = mysqli_fetch_array($result,MYSQLI_BOTH)) { ?>
   
    <header>
        <div class="logo" style="display: flex; align-items: center; padding-bottom: 10px;">
            <img src="images.png" alt="College Logo" style="height: 100px; margin-right: 10px;">
        </div>
        <h1>Government Engineering College, Gandhinagar</h1>
        <nav>
            <ul>
                <li><a href="../home.html">Home</a></li>
                
                <li><a href="Faculty_profile.php">Profile</a></li>
                <li><a href="Request_approval.php">Request Approval</a></li>
                <li><a href="faculty_logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <h1 class="heading" style="font-family:sans-serif; color: black; text-align: center; margin-bottom: 53px;background: antiquewhite;
    padding: 14px;
    width: 336px;
    box-shadow: 10px 10px 10px -6.9px #503706;">Faculty Members</h1>
    <div class="faculty-container">
        <div class="faculty">
            <img src="<?php echo $row['img_faculty']; ?>" alt="not found" class="faculty-img">
            <div class="text">
                <h2><?php echo $row['name']; ?></h2>
                <p><?php echo $row['post']; ?></p>
                <p>Email:<?php echo $row['email']; ?></p>
            </div>
            <hr>
        </div>
  </div>
  <?php
   }
					?>
 <hr>
 <div style="display: block;
    justify-content: center;    ">
  <table>
  
    <tr>
    <th rowspan="2">Sr No.</th>
    <th rowspan="2">ID</th>
        <th colspan="3" style="text-align: center;">Previous Name</th>
       
        <th rowspan="2">Address</th>
        <th rowspan="2">City</th>
        <!-- <th rowspan="2">Area</th> -->
        <th rowspan="2">Pincode</th>
        <th rowspan="2">Country</th>
        <th rowspan="2">Email ID</th>
        <th rowspan="2">Contact NO.</th>
        <th rowspan="2">Date of Birth</th>
        <th rowspan="2">holded certificate</th>
        <th colspan="3" style="text-align: center;">Correction</th>
        <th rowspan="2">ID Proof</th>
        <th rowspan="2">Image</th>
       
    </tr>
    <tr>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        
    </tr>
    <?php while($row1 = mysqli_fetch_array($res,MYSQLI_BOTH)) { ?>
    <tr>
    <td><?php echo $row1['Rid']; ?></td>
         <td><?php echo $row1['id']; ?></td>
        <td class="center"><?php echo $row1['first_nm']; ?></td>
        <td class="center"><?php echo $row1['middel_nm']; ?></td>
        <td class="center"><?php echo $row1['last_nm']; ?></td>
        <td><?php echo $row1['street_one']; echo $row1['street_second'];?></td>
        <td><?php echo $row1['city']; ?></td>
        <!-- <td><?php echo $row1['region']; ?></td> -->
        <td><?php echo $row1['zipcode']; ?></td>
        <td><?php echo $row1['cuntry']; ?></td>
        <td><?php echo $row1['email_id']; ?></td>
        <td><?php echo $row1['tel_no']; ?></td>
        <td><?php echo $row1['Dob']; ?></td>
        <td><?php echo $row1['hold_certificate']; ?></td>
        <td class="center"><?php echo $row1['offical_first']; ?></td>
        <td class="center"><?php echo $row1['offical_middel']; ?></td>
        <td class="center"><?php echo $row1['offical_last']; ?></td>     
        <td><?php echo $row1['prof_doc']; ?></td>
        <td><a  href="preview.php?preview=<?php echo $row1['Rid']?>" > <img src="<?php echo $row1['prof_image']; ?>" alt="Profile Image" width="50"></a></td>
       
    </tr>

        
    <?php
					}
                
					?>
</table>
</div>
    </div>
 
    <!-- <footer>
        &copy; 2024 Faculty Page
    </footer> -->
</body>
</html>