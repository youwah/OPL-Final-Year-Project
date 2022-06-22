<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");
    
    $supemail=$_GET["supemail"];
    $semail=$_GET["semail"];
    $namesup=$_GET["namesup"];
    
    $sqlupdateuser = "DELETE FROM tbl_272043_internlist WHERE semail ='$semail' ";
    if(mysqli_query($conn, $sqlupdateuser)){
        
        echo "<script type='text/javascript'>alert('Success!');window.location.assign('viewintern.php?email=$supemail&namesup=$namesup');</script>'";
        
    }else{
        
        echo "<script type='text/javascript'>alert('Opps... profile update failed...');window.location.assign('editlogbook.php');</script>'";
        
    }
?>