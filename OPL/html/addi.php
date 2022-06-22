<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");
   
    $supemail=$_GET["supemail"];
    $semail=$_GET["semail"];
    $name=$_GET["name"];
    $ic_number=$_GET["ic_number"];
    $supname=$_GET["supname"];
    
    $sqlupdateuser = "INSERT INTO `tbl_272043_internlist`(`supemail`,`semail`,`name`,`ic_number`,`supname`) VALUES('$supemail','$semail','$name','$ic_number','$supname')";
    if(mysqli_query($conn, $sqlupdateuser)){
        
        echo "<script type='text/javascript'>alert('Success!');window.location.assign('viewintern.php?email=$supemail&namesup=$supname');</script>'";
        
    }else{
        
        echo "<script type='text/javascript'>alert('Opps...this students is under others supervisor.');window.location.assign('addintern.php?email=$supemail&supname=$supname');</script>'";
        
    }
?>