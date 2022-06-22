<?php
  session_start();
  error_reporting(0);
  include("dbconnect.php");
  
  if (isset($_POST['login'])) {
      $email = $_POST["email"];
      $_SESSION["email"] = "$email";
      $password = $_POST["password"];
      $pass_sha1 = sha1($password);
      $_SESSION["password"] = "$pass_sha1";
      $position = $_POST["position"];
      $_SESSION["position"] = "$position";
      
      if($position == "Admin"){
       $query = "SELECT * FROM `tbl_272043_admin` WHERE `email` = '".strtolower($email)."' AND `password` = '$pass_sha1' ";
	   $result = $conn->query($query);
	    if ($result->num_rows > 0) {
	        echo "<script type='text/javascript'>alert('Success!');location.href = 'https://crimsonwebs.com/s272043/OPL/html/dashboardadmin.php';</script>";
	    }else{
	         echo "<script type='text/javascript'>alert('Failed! Please enter correct email or password!');history.go(-1)</script>";
	    } 
      }
      
      else if($position == "Student"){
        $query = "SELECT * FROM `tbl_272043_student` WHERE `email` = '".strtolower($email)."' AND `password` = '$pass_sha1' ";
	   $result = $conn->query($query);
	    if ($result->num_rows > 0) {
	        echo "<script type='text/javascript'>alert('Success!');location.href = 'https://crimsonwebs.com/s272043/OPL/html/dashboard.php';</script>";
	    }else{
	         echo "<script type='text/javascript'>alert('Failed! Please enter correct email or password!');history.go(-1)</script>";
	    }  
      }
      else if($position == "Lecturer"){
      $query = "SELECT * FROM `tbl_272043_lecturer` WHERE `email` = '".strtolower($email)."' AND `password` = '$pass_sha1' ";
	   $result = $conn->query($query);
	    if ($result->num_rows > 0) {
	        echo "<script type='text/javascript'>alert('Success!');location.href = 'https://crimsonwebs.com/s272043/OPL/html/dashboardlec.php';</script>";
	    }else{
	         echo "<script type='text/javascript'>alert('Failed! Please enter correct email or password!');history.go(-1)</script>";
	    }
          
      }
        else if($position == "Supervisor"){
      $query = "SELECT * FROM `tbl_272043_supervisor` WHERE `email` = '".strtolower($email)."' AND `password` = '$pass_sha1' ";
	   $result = $conn->query($query);
	    if ($result->num_rows > 0) {
	        echo "<script type='text/javascript'>alert('Success!');location.href = 'https://crimsonwebs.com/s272043/OPL/html/dashboardsup.php';</script>";
	    }else{
	         echo "<script type='text/javascript'>alert('Failed! Please enter correct email or password!');history.go(-1)</script>";
	    }
          
      }
  } 
?>

