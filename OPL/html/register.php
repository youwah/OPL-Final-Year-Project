<?php
  session_start();
  error_reporting(0);
  include("dbconnect.php");
  
  if (isset($_POST['signup'])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $ic = $_POST["ic"];
    $phonenumber = $_POST["phonenumber"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $pass_sha1 = sha1($password);
    $position = $_POST["position"];
    $_SESSION["position"] = "$position";
    
    if($position == "Student"){
    $query = "INSERT INTO `tbl_272043_student`(`fname`,`lname`,`email`,`password`,`ic_number`,`phone_number`) VALUES('".strtoupper($firstname)."','".strtoupper($lastname)."','".strtolower($email)."','$pass_sha1','$ic','$phonenumber')";
    if(mysqli_query($conn, $query))
    {
    echo "<script type='text/javascript'>alert('Successfully Registered');location.href = 'https://crimsonwebs.com/s272043/OPL/html/landingpage.php';</script>";
    }else{
    echo "<script type='text/javascript'>alert('Email Already Exists!');history.go(-1)</script>";
    }
    
    }else if($position == "Lecturer"){
   $query = "INSERT INTO `tbl_272043_lecturer`(`fname`,`lname`,`email`,`password`,`ic_number`,`phone_number`) VALUES('".strtoupper($firstname)."','".strtoupper($lastname)."','".strtolower($email)."','$pass_sha1','$ic','$phonenumber')";
    if(mysqli_query($conn, $query))
    {
    echo "<script type='text/javascript'>alert('Successfully Registered');location.href = 'https://crimsonwebs.com/s272043/OPL/html/landingpage.php';</script>";
    }else{
    echo "<script type='text/javascript'>alert('Email Already Exists!');history.go(-1)</script>";
    }
        
    }else if($position == "Supervisor"){
       $query = "INSERT INTO `tbl_272043_supervisor`(`fname`,`lname`,`email`,`password`,`ic_number`,`phone_number`) VALUES('".strtoupper($firstname)."','".strtoupper($lastname)."','".strtolower($email)."','$pass_sha1','$ic','$phonenumber')";
    if(mysqli_query($conn, $query))
    {
    echo "<script type='text/javascript'>alert('Successfully Registered');location.href = 'https://crimsonwebs.com/s272043/OPL/html/landingpage.php';</script>";
    }else{
    echo "<script type='text/javascript'>alert('Email Already Exists!');history.go(-1)</script>";
    }    
        
    }else {
            $query = "INSERT INTO `tbl_272043_admin`(`fname`,`lname`,`email`,`password`,`ic_number`,`phone_number`) VALUES('".strtoupper($firstname)."','".strtoupper($lastname)."','".strtolower($email)."','$pass_sha1','$ic','$phonenumber')";
    if(mysqli_query($conn, $query))
    {
    echo "<script type='text/javascript'>alert('Successfully Registered');location.href = 'https://crimsonwebs.com/s272043/OPL/html/landingpage.php';</script>";
    }else{
    echo "<script type='text/javascript'>alert('Email Already Exists!');history.go(-1)</script>";
    }     
        
    }
    
    
    
  } 
  
  
?>