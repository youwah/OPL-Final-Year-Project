<?php
session_start();
error_reporting(0);
include("dbconnect.php");
$email = $_SESSION['email'];



if (isset($_POST['submitok'])){

        echo "<script type='text/javascript'>window.location.assign('locationinternlist.php');</script>'";
        


}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Myprofile</title>
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/form.css">
	 <link rel="stylesheet" href="../css/homepage.css">
	<!--Import Icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!--Import Other Class-->
    <script src="//code.jquery.com/jquery.min.js"></script>

    <!------------------------Call Nav------------------------>
    <link rel="stylesheet" href="../css/adminnavi.css">
    <link rel="stylesheet" href="../css/usernavi.css">
    <script src="../js/adminnavi.js"></script>
    <script src="../js/usernavi.js"></script>
    <!------------------------Call Nav------------------------>
    
    <!------------------------Call Aunthentication------------------------>
    <script src="../js/userauthentication/login.js"></script>
    <script src="../js/userauthentication/signUp.js"></script>
    <script src="../js/userauthentication/forget.js"></script>
    <script src="../js/userauthentication/logout.js"></script>
    <link rel="stylesheet" href="../css/userauthentication/login.css">
    <link rel="stylesheet" href="../css/userauthentication/signUp.css">
    <link rel="stylesheet" href="../css/userauthentication/forget.css">
    <!------------------------Call Aunthentication------------------------>
    <style>
    .card {
        /* Add shadows to create the "card" effect */
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
    }
    
          .header {
padding: 10px 0px 10px 0px;
width:auto%;
background: black;
color: white;
font-size: 15px;
}
      .header img{
margin-left:20px;
float: left;
width: 70px;
height: 70px;
}
  
    .topnav {
      overflow: hidden;
      background-color: black;
    }
    .topnav a {
      float: left;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }
    .topnav a:hover {
      background-color: #2296F3;
      color: black;
    }
h1 {color: white;
    align=center;
    text-align: center;
    font-size: 50px;
    margin-top: 0.15em;
    margin-bottom: 0.15em;
} 

.savebtn {
  width: 300px;
  background-color: green;
  color: black;
  border: grey;
  font-size:16px;
  cursor: pointer;
  border-radius: 40px;

}

.cancelbtn {
  width: 300px;
  background-color: red;
  color: black;
  border: grey;
  font-size:16px;
  cursor: pointer;
  border-radius: 40px;
  
  
}


.bigbox{
	padding-top: 30px; 
	padding-bottom: 20px; 
	float: left;
	width:100%;
	display: flex; 
	justify-content: center;

}

.logoutbtn {
background-color: #2296F3;
color: white;
padding: 8px 15px;
margin-right: 50px;
font-size: 16px;
cursor: pointer;
border: grey;
box-shadow: 2px 4px grey;
float:right;
}

body{
background-color: white;
margin: 0;
padding: 0;
width:100%;
max-width:1920px;
min-width:480px;
margin-left:auto;
margin-right:auto;
height:auto; 
overflow-y: auto;
overflow-x: hidden;
}

 

    
    </style>
</head>

<body>
<div class="header"style="position:relative">
		<h1>&nbspOnline Practicum Logbook (OPL)
		<!------------------------Call Aunthentication------------------------>
		<?php
		    session_start();
            error_reporting(0);
            include("dbconnect.php");
            $email = $_SESSION['email'];
            $password = $_SESSION['password'];
            $position = $_SESSION['position'];
            if (isset($_SESSION["email"])){
             $sqlloaduser = "SELECT * FROM tbl_272043_supervisor WHERE email = '$email' AND password = '$password' ";
                $result = $conn->query($sqlloaduser);
                if ($result->num_rows > 0 && $position == "Supervisor") {
                    while ($row = $result -> fetch_assoc()){
                        extract ($row);
                    if(isset($pic)){
                        ?>
                        <img src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($pic); ?>" style= "height: 30px;width: 30px; border-radius:50%;position:absolute;right:13%;top:40%"> 
                <?php
                    }else{
                        ?>
                        <img style= "height: 30px;width: 30px; border-radius:50%;position:absolute;right:13%;top:40%" src="../images/user.png" alt="profileimg">
                    <?php
                    }
                
                    }
	            ?>    
                <span style="position:absolute; right:15%;top:50%;font-size:12px"></span>
                <button type="submit" class="logoutbtn" onclick="logOut()"><b>Log Out</b></button>
                <?php
                }
                else if($position == "Admin" && $email=="asiatopu@gmail.com" && $password=="7af2d10b73ab7cd8f603937f7697cb5fe432c7ff"){
                ?>
                <button type="submit" class="logoutbtn" onclick="logOut()"><b>Log Out</b></button>
                <?php    
                }
                else{
                  ?>

            <?php  
                }
                ?>
		  
            <?php
            }else{
            ?>

            <?php
            }
		?>
		<!------------------------Call Aunthentication------------------------>
	
    	<!------------------------Check Position------------------------>
		<?php
		    session_start();
            error_reporting(0);
            include("dbconnect.php");
            $email = $_SESSION['email'];
            $password = $_SESSION['password'];
            $position = $_SESSION['position'];
            if (isset($_SESSION["email"])){
             $sqlloaduser = "SELECT * FROM tbl_272043_supervisor WHERE email = '$email' AND password = '$password' ";
                $result = $conn->query($sqlloaduser);
                if ($result->num_rows > 0 && $position == "Supervisor") {
                ?>
               </div>
 <div class="topnav mb-3 mt-4">
         <a href="dashboardsup.php">Dashboard</a>
        <a href="reviewintern.php">Review Logbook</a>
        <a href="locationinternlist.php">Check Location</a>
        <a href="supprofile.php">My Profile</a>
       
        
   
    </div>
	<div style="height: 350px; width:80%;background-color: white;max-width:1920px; min-width:480px; margin-center:auto; margin-right:auto; margin:auto; padding:auto; overflow:hidden;float:center">
		<div style="margin-left: 10px;margin-top: 10px; background-color: white; height: 50px; width:250px;float:left"><i class="material-icons" style="float: left;margin-top: 5px;margin-left: 5px; font-size: 40px">&#xe7fd;</i><span class="discover" style="margin-left: 10px;margin-top: 13px">Intern Detail</span></div>
		<br><br>
		<?php
	    session_start();
        error_reporting(0);
        include("dbconnect.php");
        $email = $_SESSION['email'];
        $studentemail=$_GET["studentemail"];
	    $sqlloaduser = "SELECT * FROM tbl_272043_student WHERE email='$studentemail'";
	    
	     $result = $conn->query($sqlloaduser);
	    if ($result->num_rows > 0){
	        while ($row = $result -> fetch_assoc()){
	        extract ($row);
	        if(isset($pic)){
	    ?>
		    <img src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($pic); ?>" style= "height: 150px;width: 150px;display: block;margin-top: 40px; margin-left: auto;margin-right: auto; border-radius:50%">
		<?php
		    }else{
		        ?>
		        <img style= "height: 150px;width: 150px;display: block;margin-top: 40px; margin-left: auto;margin-right: auto; border-radius:50%" src="../images/user.png" alt="profileimg">
		        <?php
		    }
	    ?>
		<div style="text-align: center; margin-top: 10px"><span class="discover" style="color:black; float: none; margin-left: 0px"><?php echo $lname ?></span></div>
		<?php
	        }}?>
	</div>
	<form method="post">
	    <?php
	    session_start();
        error_reporting(0);
        include("dbconnect.php");
        $email = $_SESSION['email'];
        $studentemail=$_GET["studentemail"];
	    $sqlloaduser = "SELECT * FROM tbl_272043_student WHERE email='$studentemail'";
	    
	     $result = $conn->query($sqlloaduser);
	    if ($result->num_rows > 0){
	        while ($row = $result -> fetch_assoc()){
	        extract ($row);
	            ?>
	    <div class="bigbox">
		<div style="width: 500px; float: left">
			<span class="label" style="float: left">First Name:</span> 
			<input type="text" style="height:20px; width: 300px; float: right" name="firstname" value="<?php echo $lname ?>" readonly>
		</div>
		<div style="width: 560px; float:left">
			<span class="label" style="float: left; padding-left: 20px">Race:</span> <input type="text" style="height:20px; width: 300px; float: right " name="lastname" value="<?php echo $fname ?>" readonly>
		</div>	
	</div>
	<div class="bigbox">
		<div style="width: 500px; float: left">
			<span class="label" style="float: left">Phone Number:</span> <input type="text" style="height:20px; width: 300px; float: right" name="phonenumber" value="<?php echo $phone_number ?>"readonly>
			<div style="padding-top: 30px"><span class="label" style="float: left">
			</div>
			
		</div>
		<div style="width: 560px; float:left">
			<span class="label" style="float: left; padding-left: 20px">IC Number:</span> <input type="text" style="height:20px; width: 300px; float: right" name="ic_number" value="<?php echo $ic_number ?>"readonly>
			
		</div>	
		
	</div>
	
		<div class="bigbox">
		<div style="width: 500px; float: left">
			<span class="label" style="float: left">Email:</span> <input type="text" style="height:20px; width: 300px; float: right" name="email" value="<?php echo $email ?>"  readonly>
			<div style="padding-top: 80px"><span class="label" style="float: left">
			</div>
			
		</div>
		<div style="width: 560px; float:left">
			<span class="label" style="float: left; padding-left: 20px">User ID:</span> <input type="text" style="height:20px; width: 300px; float: right" name="user_id" value="<?php echo $user_id ?>"readonly>
			
		</div>	
		
	</div>
	<div class="bigbox">
		<button type="submit" class="cancelbtn" name="submitok" style="margin-left: 10px"><b>Back</b></button>

		
	</div>
	 <?php
	        }
	    }
	        
	        
	    
	    ?>
	</form>
                <?php
                }
                else if($position == "Admin" && $email=="asiatopu@gmail.com" && $password=="7af2d10b73ab7cd8f603937f7697cb5fe432c7ff"){
                ?>
                 <div class="topnav mb-3 mt-4">
        <a href="landingpage.php">LOGIN</a>
        <a href="registration.php">REGISTRATION</a>
     
                <?php    
                }
                else{
                  ?>
                 	</div>
		<div class="topnav mb-3 mt-4">
        <a href="landingpage.php">LOGIN</a>
        <a href="registration.php">REGISTRATION</a>
    
        
   
    </div>
<p class="mb-100 mt-10"><br>
    <h2 style="text-align:center; font-size: 70px;" class="display-4">Welcome to the OPL System.</h2><br>
    <h3 style="text-align:center;" class="display-4">OPL System is actually an online practicum logbook system  </h3>
    <h3 style="text-align:center;" class="display-4">For using this system please login to an account.</h3>

    <p align=center> 
            <?php  
                }
                ?>
		  
            <?php
            }else{
            ?>
             	</div>
		<div class="topnav mb-3 mt-4">
        <a href="landingpage.php">LOGIN</a>
        <a href="registration.php">REGISTRATION</a>
        
        
   
    </div>
<p class="mb-100 mt-10"><br>
    <h2 style="text-align:center; font-size: 70px;" class="display-4">Welcome to the OPL System.</h2><br>
    <h3 style="text-align:center;" class="display-4">OPL System is actually an online practicum logbook system  </h3>
    <h3 style="text-align:center;" class="display-4">For using this system please login to an account.</h3>

    <p align=center>
            <?php
            }
		?>
	<!------------------------Call Position------------------------>


	
	<!------------------------Call Aunthentication------------------------>
	<div id="bgmodalSignUp"></div>
	<div id="bgmodalForget"></div>
	<!------------------------Call Aunthentication------------------------>
	
	
</body>
</html>