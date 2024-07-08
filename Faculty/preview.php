 <?php 

 require "Connection_db.php";

$sql1="SELECT prof_image FROM correction_rqt where Rid='".$_REQUEST['preview']."'" ;


$res= mysqli_query($conn,$sql1);





?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
        
    margin: 12px;
    padding: 17px;
    }

    body{
        background: #00000066;
    }
    
    a img:hover{
        background:"blue";
    }
    </style>
    
</head>
<body>


<a href="Faculty_profile.php"><img src="images/close.jpg" width="50"></a>
<?php while($row1 = mysqli_fetch_array($res,MYSQLI_BOTH)) { ?>



<center><img src="<?php echo $row1['prof_image'];?>" alt="Profile Image" width="30%" >
</center>
<?php
					}
                
					?>
</body>
</html>