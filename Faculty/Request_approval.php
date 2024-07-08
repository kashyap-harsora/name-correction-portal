
<?php 

require "Connection_db.php";

$sql_current = "SELECT * FROM correction_rqt WHERE status = 'Pending'";
$res_current = mysqli_query($conn, $sql_current);

$sql1="SELECT * FROM correction_rqt WHERE status = 'Approved' OR status = 'Rejected'";


$res= mysqli_query($conn,$sql1);

if(isset($_REQUEST['fid_update']) )
{

    // $finalfirst=$_REQUEST['offical_first'];
    // $finalprevious=$_REQUEST['offical_middel'];
    // $finallast=$_REQUEST['offical_last'];

    
    
 $update_sql="UPDATE correction_rqt  SET first_nm=offical_first ,middel_nm=offical_middel, last_nm = offical_last ,status='approved' where  Rid =' ".$_REQUEST['fid_update']."'";

 $update_result=mysqli_query($conn,$update_sql);
 

            if($update_result)
            {
                echo"<script> alert('Request Approved');window.location='Request_approval.php';</script>";
            }
            else {
                echo"<script> alert('Something is wrong !!');window.location='Request_approval.php';</script>";
            }
        }
 elseif(isset($_REQUEST['fid_rejected']) ){
    // || isset($_POST['region'])
    //  $comment=$_POST['region'];
    // $sql4="INSERT INTO correction_rqt(comments)VALUES('".$comment."')";
    //  $res4= mysqli_query($conn,$sql4);
    //  ,comments='".$comment."' 
    $update_sql1="UPDATE correction_rqt  SET  status='Rejected' where  Rid =' ".$_REQUEST['fid_rejected']."'";
    $update_result1=mysqli_query($conn,$update_sql1);
    if($update_result1)
    {
        echo"<script> alert('Request Rejected');window.location='Request_approval.php';</script>";
    }
    else{
        echo"<script> alert('Rejection falied !!');window.location='Request_approval.php';</script>";
    }
    if(isset($_REQUEST['preview']))
{        
 $Preview_sql="SELECT pro_image  FROM correction_rqt where Rid='".$_REQUEST['preview']."'";

 $Preview_result=mysqli_query($conn,$Preview_sql);
 

          
        }


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
            width:102%;
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

   

   
 <div  style="display: block;  margin: 122px;">



<h1 class="heading" style="font-family:sans-serif; color: black; text-align: center; margin-bottom: 53px;background: antiquewhite;
    padding: 14px;
    width: 336px;
    box-shadow: 10px 10px 10px -6.9px #503706;">Past Requests</h1>
  <table>
  
    <tr>
    <th rowspan="2">Sr No.</th>
    <th rowspan="2">ID</th>
        <th colspan="3" style="text-align: center;">Previous Name</th>
    
        <th rowspan="2">Email ID</th>
        <th rowspan="2">Contact NO.</th>
        <th rowspan="2">holded certificate</th>
        <th colspan="3" style="text-align: center;">Correction</th>
        <th rowspan="2">ID Proof</th>
        <th rowspan="2">Image</th>
        <th rowspan="2">Status</th>
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
    
         
            
        
        <td><?php echo $row1['email_id']; ?></td>
        <td><?php echo $row1['tel_no']; ?></td>
        <td><?php echo $row1['hold_certificate']; ?></td>
        <td class="center"><?php echo $row1['offical_first']; ?></td>
        <td class="center"><?php echo $row1['offical_middel']; ?></td>
        <td class="center"><?php echo $row1['offical_last']; ?></td>     
        <td><?php echo $row1['prof_doc']; ?></td>
        <td><a  href="preview.php?preview=<?php echo $row1['Rid']?>" > <img src="<?php echo $row1['prof_image']; ?>" alt="Profile Image" width="50"></a></td>
        <td><?php echo $row1['status']; ?></td>
     
    </tr> 

        
    <?php
					}
    
					?>
</table>
                </div>
                <div  style="display: block;  margin: 122px;">

<h1 class="heading" style="font-family:sans-serif; color: black; text-align: center; margin-bottom: 53px;background: antiquewhite;
    padding: 14px;
    width: 336px;
    box-shadow: 10px 10px 10px -6.9px #503706;">Current request </h1>
   

  <table>
  
    <tr>
    <th rowspan="2">Sr No.</th>
    <th rowspan="2">ID</th>
        <th colspan="3" style="text-align: center;">Previous Name</th>
    
        <th rowspan="2">Email ID</th>
        <th rowspan="2">Contact NO.</th>
        <th rowspan="2">holded certificate</th>
        <th colspan="3" style="text-align: center;">Correction</th>
        <th rowspan="2">ID Proof</th>
        <th rowspan="2">Image</th>
        <th rowspan="2">Accept</th>
        <th rowspan="2">Rejected</th>
        <!-- <th rowspan="2">comments</th> -->
    </tr>

    <tr>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        
    </tr>

    <?php while($row1 = mysqli_fetch_array($res_current,MYSQLI_BOTH)) { ?>
      
    <tr>
    <td><?php echo $row1['Rid']; ?></td>
         <td><?php echo $row1['id']; ?></td>
        <td class="center"><?php echo $row1['first_nm']; ?></td>
        <td class="center"><?php echo $row1['middel_nm']; ?></td>
        <td class="center"><?php echo $row1['last_nm']; ?></td>
    
         
            
        
        <td><?php echo $row1['email_id']; ?></td>
        <td><?php echo $row1['tel_no']; ?></td>
        <td><?php echo $row1['hold_certificate']; ?></td>
        <td class="center"><?php echo $row1['offical_first']; ?></td>
        <td class="center"><?php echo $row1['offical_middel']; ?></td>
        <td class="center"><?php echo $row1['offical_last']; ?></td>     
        <td><?php echo $row1['prof_doc']; ?></td>
        <td><a  href="preview.php?preview=<?php echo $row1['Rid']?>" > <img src="<?php echo $row1['prof_image']; ?>" alt="Profile Image" width="50"></a></td>
        
       <td><a name="accept" href="Request_approval.php?fid_update=<?php echo $row1['Rid']?>"><img  style="background-color: transparent;" src  = "images/tick.jpg"  width=80%  height=50%>
						</img></a></td>
                        
        <td><a name="accept" href="Request_approval.php?fid_rejected=<?php echo $row1['Rid']?>"><img  style="background-color: transparent;margin: 5px;" src  = "images/rejected.png"  width=80%  height=40%>
						</img></a></td>
        <!-- <td> <input type="text" name="region" style="width: 100%; height: 100%; box-sizing: border-box;"   placeholder="Enter here"> </td>
    </tr> -->

        
    <?php
					}
    
					?>
</table>

</div>
    </div>
    <br>
    
 
    <!-- <footer>
        &copy; 2024 Faculty Page
    </footer> -->
</body>
</html>