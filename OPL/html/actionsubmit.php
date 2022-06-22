<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");
   
    $email = $_SESSION['email'];
    $workdone = $_POST['workdone'];
    $hourswork = $_POST['hourswork'];
    $dateday = $_POST['dateday'];
    $remark = $_POST['remark'];
    $file = $_FILES["image"]["tmp_name"];
    $month=$_GET["month"];

if (isset($_POST['submit'])){
    


    
    if(empty($email)){
            echo "<script type='text/javascript'>alert('Please login to perform this function!');window.location.assign('action.php');</script>'";
    } else{
        if(empty($file)){
                 $sqlsearch = "SELECT * FROM `tbl_logbook` WHERE email = '$email'";
        $result = $conn->query($sqlsearch);

            $checkin = "INSERT INTO `tbl_272043_logbook`(`email`,`workdone`,`hourswork`,`dateday`,`remark`,`status`,`comment`,`month`) VALUES('$email','$workdone','$hourswork','$dateday','$remark','Unverify','','$month')";
            if(mysqli_query($conn, $checkin)){
            echo  "<script type='text/javascript'>alert('Success!');window.location.assign('actionReport.php');</script>'";
            }
            else{
                echo "<script type='text/javascript'>alert('Failed!!');window.location.assign('action.php');</script>'";
            }   
            
            
        }else{
        $image= addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
        $image_size = getimagesize($_FILES['image']['tmp_name']);
        $sqlsearch = "SELECT * FROM `tbl_logbook` WHERE email = '$email'";
        $result = $conn->query($sqlsearch);

            $checkin = "INSERT INTO `tbl_272043_logbook`(`email`,`workdone`,`hourswork`,`dateday`,`remark`,`status`,`pic`,`comment`,`month`) VALUES('$email','$workdone','$hourswork','$dateday','$remark','Unverify','$image','','$month')";
            if(mysqli_query($conn, $checkin)){
            echo  "<script type='text/javascript'>alert('Success!');window.location.assign('actionReport.php');</script>'";
            }
            else{
                echo "<script type='text/javascript'>alert('Failed!!');window.location.assign('action.php');</script>'";
            }
        }
        
    }

    
}
?>