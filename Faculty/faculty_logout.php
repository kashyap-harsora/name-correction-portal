<?php
session_start();
$_SESSION['aid']="";
session_destroy();
header('location:../home.html');
?>