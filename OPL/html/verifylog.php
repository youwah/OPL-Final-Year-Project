<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");
   
    $logid=$_GET["logid"];
        $studentname=$_GET["studentname"];
    $studentemail=$_GET["studentemail"];
    
    
    if (isset($_POST['verify'])){
    $sqlupdateuser="UPDATE tbl_272043_logbook SET status='Verify' WHERE logid=$logid";
    if(mysqli_query($conn, $sqlupdateuser)){
        
        echo "<script type='text/javascript'>alert('Success!');window.location.assign('reviewpage.php?studentname=$studentname&studentemail=$studentemail');</script>'";
        
    }else{
        
        echo "<script type='text/javascript'>alert('Opps... profile update failed...');window.location.assign('editlogbook.php');</script>'";
        
    }
    
    } 
    if (isset($_POST['commenttt'])){
    $sqlupdateuser="UPDATE tbl_272043_logbook SET status='Verify',comment='$_POST[comment]' WHERE logid=$logid";
    if(mysqli_query($conn, $sqlupdateuser)){
        
        echo "<script type='text/javascript'>alert('Success!');window.location.assign('reviewpage.php?studentname=$studentname&studentemail=$studentemail');</script>'";
        
    }else{
        
        echo "<script type='text/javascript'>alert('Opps... profile update failed...');window.location.assign('editlogbook.php');</script>'";
        
    }

}
?>