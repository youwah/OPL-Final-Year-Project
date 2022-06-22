<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");
    $logid=$_GET["logid"];
    $email = $_SESSION['email'];
    $workdone = $_POST['workdone'];
    $hourswork = $_POST['hourswork'];
    $dateday = $_POST['dateday'];
    $remark = $_POST['remark'];
    $file = $_FILES["image"]["tmp_name"];
    

if (isset($_POST['submit'])){
    if(empty($file)){
        $sqlupdateuser="UPDATE tbl_272043_logbook SET workdone='$_POST[workdone]',hourswork='$_POST[hourswork]',dateday='$_POST[dateday]',remark='$_POST[remark]' WHERE logid=$logid";
    if(mysqli_query($conn, $sqlupdateuser)){
        
        echo "<script type='text/javascript'>alert('Success!');window.location.assign('actionReport.php');</script>'";
        
    }else{
        
        echo "<script type='text/javascript'>alert('Opps... profile update failed...');window.location.assign('editlogbook.php');</script>'";
        
    } 
    }else{
    $image= addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    $sqlupdateuser="UPDATE tbl_272043_logbook SET workdone='$_POST[workdone]',hourswork='$_POST[hourswork]',dateday='$_POST[dateday]',remark='$_POST[remark]', pic='$image' WHERE logid=$logid";
    if(mysqli_query($conn, $sqlupdateuser)){
        
        echo "<script type='text/javascript'>alert('Success!');window.location.assign('actionReport.php');</script>'";
        
    }else{
        
        echo "<script type='text/javascript'>alert('Opps... profile update failed...');window.location.assign('editlogbook.php');</script>'";
        
    }
    }

}

if (isset($_POST['submitok'])){

        echo "<script type='text/javascript'>window.location.assign('actionReport.php');</script>'";
        


}


?>