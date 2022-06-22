<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");
   
    $email = $_SESSION['email'];
    

?>
<!DOCTYPE html>
<html><head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/56e1a6fc52.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!--Import Other Class-->
    <script src="//code.jquery.com/jquery.min.js"></script>
    <!------------------------Call Nav------------------------>
    <link rel="stylesheet" href="../css/adminnavi.css">
    <link rel="stylesheet" href="../css/usernavi.css">
    <script src="../js/adminnavi.js"></script>
    <script src="../js/usernavi.js"></script>
    <!------------------------Call Nav------------------------>
	<link rel="stylesheet" href="../css/header.css"> 
<!-- 	<link rel="stylesheet" href="../css/homepage.css"> -->
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

	
	<title>Dashboard</title>
	
	
		<script language="javascript">
	    // JavaScript Document
          $(document).ready(function() {
            $('#example').DataTable( {
                "pagingType": "full_numbers"
            } );
          } );
	    </script>
	
	
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
    
    .column {
  float: left;
  width: 30%;
  padding: 10px;
  text-align: center;
 
    }

    .row:after {
    content:" ";
   display: table;
    }
h1 {color: white;
    align=center;
    text-align: center;
    font-size: 50px;
    margin-top: 0.15em;
    margin-bottom: 0.15em;
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

.btn {
background-color: #2296F3;
color: white;
padding: 8px 15px;
margin-right: -80px;
font-size: 16px;
cursor: pointer;
border: none;
box-shadow: 2px 4px grey;
float:right;
}

.btn2 {
background-color: #2296F3;
color: white;
padding: 8px 15px;
margin-right: -100px;
font-size: 16px;
cursor: pointer;
border: none;
box-shadow: 2px 4px grey;
float:center;
}

.btn3 {
background-color: #2296F3;
color: white;
padding: 8px 35px;
margin-right: 50px;
font-size: 16px;
cursor: pointer;
border: none;
box-shadow: 2px 4px grey;
float:left;
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

.flex-parent {
  display: flex;
}

.jc-center {
  justify-content: center;
}

button.margin-right {
  margin-right: 70px;
  background-color: #2296F3;
color: white;
padding: 8px 15px;
font-size: 16px;
border: none;
box-shadow: 2px 4px grey;
cursor: pointer;
}

button.magenta {
  background-color: #2296F3;
color: white;
padding: 8px 15px;
font-size: 16px;
border: none;
box-shadow: 2px 4px grey;
cursor: pointer;
}

</style>
</head>
<body onload="startTime()">

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
             $sqlloaduser = "SELECT * FROM tbl_272043_admin WHERE email = '$email' AND password = '$password' ";
                $result = $conn->query($sqlloaduser);
                if ($result->num_rows > 0 && $position == "Admin") {
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
                else if($position == "Admin1" && $email=="webstar@gmail.com" && $password=="7af2d10b73ab7cd8f603937f7697cb5fe432c7ff"){
                    
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
             $sqlloaduser = "SELECT * FROM tbl_272043_admin WHERE email = '$email' AND password = '$password' ";
                $result = $conn->query($sqlloaduser);
                if ($result->num_rows > 0 && $position == "Admin") {
                ?>
               		</div>
 <div class="topnav mb-3 mt-4">
        <a href="dashboardadmin.php">Dashboard</a>
        <a href="managelecturer.php">Manage Lecturer</a>
        <a href="managesupervisor.php">Manage Supervisor</a>

   
        
   
    </div>
</div>
  

	
	</div>
                <?php
                }
                else if($position == "Admin1" && $email=="webstar@gmail.com" && $password=="7af2d10b73ab7cd8f603937f7697cb5fe432c7ff"){
                ?>
               	</div>
 <div class="topnav mb-3 mt-4">
        <a href="landingpage.php">LOGIN</a>
        <a href="registration.php">REGISTRATION</a>
        
        
        
   
    </div>
</div>
  
<p class="mb-100 mt-10"><br>
    <h2 style="text-align:center; font-size: 70px;" class="display-4">Welcome to the OPL System.</h2><br>
    <h3 style="text-align:center;" class="display-4">OPL System is actually an online practicum logbook system  </h3>
    <h3 style="text-align:center;" class="display-4">For using this system please login to an account.</h3>

    <p align=center>
    
	
	</div>
                <?php    
                }
                else{
                  ?>
                 	</div>
		<div class="topnav mb-3 mt-4">
        <a href="landingpage.php">LOGIN</a>
        <a href="registration.php">REGISTRATION</a> 
      
        
   
    </div>
</div>
  
<p class="mb-100 mt-10"><br>
    <h2 style="text-align:center; font-size: 70px;" class="display-4">Welcome to the OPL System.</h2><br>
    <h3 style="text-align:center;" class="display-4">OPL System is actually an online practicum logbook system  </h3>
    <h3 style="text-align:center;" class="display-4">For using this system please login to an account.</h3>

    <p align=center>
    
	
	</div>
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
</div>
  
<p class="mb-100 mt-10"><br>
    <h2 style="text-align:center; font-size: 70px;" class="display-4">Welcome to the OPL System.</h2><br>
    <h3 style="text-align:center;" class="display-4">OPL System is actually an online practicum logbook system  </h3>
    <h3 style="text-align:center;" class="display-4">For using this system please login to an account.</h3>

    <p align=center>
    
	
	</div>
            <?php
            }
		?>

		</div >

        	<div style="height: 350px; width:80%;background-color: white;max-width:1920px; min-width:480px; margin-center:auto; margin-right:auto; margin:auto; padding:auto; overflow:hidden;float:center">
		<div style="margin-left: 10px;margin-top: 10px; background-color: white; height: 50px; width:250px;float:left"></div>
		<br><br>
		<?php
	    session_start();
        error_reporting(0);
        include("dbconnect.php");
        $email = $_SESSION['email'];
        
	    $sqlloaduser = "SELECT * FROM tbl_272043_admin WHERE email='$email'";
	    
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
		<div style="text-align: center; margin-top: 5px"><span class="discover" style="color:black; float: none; margin-left: 0px"><?php echo $fname ?> <?php echo $lname ?></span></div>
		<div style="height:10px; width:100px; background-color:white; margin-left:auto;margin-right:auto; position:relative">
        <p class="mb-100 mt-10">
    <h3 style="text-align:center;" class="display-4">Role:Admin</h3>
		   <p align=center> 
		</div>
			</div>

<div class="flex-parent jc-center">
  <button type="submit" onclick="document.location='managelecturer.php'" class="green margin-right">Manage Lecturer</button>
  <button type="submit" onclick="document.location='managesupervisor.php'" class="magenta">Manage Spervisor</button>
</div>
		<?php
	        }}?>

	
    <!------------------------Call Aunthentication------------------------>
	<div id="bgmodalSignUp"></div>
	<div id="bgmodalForget"></div>
	<!------------------------Call Aunthentication------------------------>


</body>
</html>