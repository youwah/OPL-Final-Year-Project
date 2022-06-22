<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");
   
    $lemail=$_GET["lemail"];
    $semail=$_GET["semail"];
    $name=$_GET["name"];
    $ic_number=$_GET["ic_number"];
    $lecname=$_GET["lecname"];
    
    $sqlupdateuser = "INSERT INTO `tbl_272043_studentlist`(`lemail`,`semail`,`name`,`ic_number`,`lecname`) VALUES('$lemail','$semail','$name','$ic_number','$lecname')";
    if(mysqli_query($conn, $sqlupdateuser)){
        
        echo "<script type='text/javascript'>alert('Success!');window.location.assign('viewstudent.php?email=$lemail&namelec=$lecname');</script>'";
        
    }else{
        
        echo "<script type='text/javascript'>alert('Opps...this students is under others lecturer.');window.location.assign('addstudent.php?email=$lemail&lecname=$lecname');</script>'";
        
    }
?>