<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");
    
    $lemail=$_GET["lemail"];
    $semail=$_GET["semail"];
    $lecname=$_GET["lecname"];
    
    $sqlupdateuser = "DELETE FROM tbl_272043_studentlist WHERE semail ='$semail' ";
    if(mysqli_query($conn, $sqlupdateuser)){
        
        echo "<script type='text/javascript'>alert('Success!');window.location.assign('viewstudent.php?email=$lemail&namelec=$lecname');</script>'";
        
    }else{
        
        echo "<script type='text/javascript'>alert('Opps... profile update failed...');window.location.assign('editlogbook.php');</script>'";
        
    }
?>