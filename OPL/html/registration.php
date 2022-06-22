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

	
	<title>Home</title>
	
	
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
width:auto;
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
h4 {color: red;}
    
.signupbtn {
background-color: #2296F3;
color: white;
padding: 8px 15px;
margin-right: 20px;
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

thing{
   border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;   
    
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
             $sqlloaduser = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password' ";
                $result = $conn->query($sqlloaduser);
                if ($result->num_rows > 0 && $position == "User") {
                    header("location: dashboard.php");
                    while ($row = $result -> fetch_assoc()){
                        extract ($row);
                    if(isset($pic)){
                        ?>
                        <img src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($pic); ?>" style= "height: 30px;width: 30px; border-radius:50%;position:absolute;right:20%;top:40%"> 
                <?php
                    }else{
                        ?>
                        <img style= "height: 30px;width: 30px; border-radius:50%;position:absolute;right:20%;top:40%" src="../images/user.png" alt="profileimg">
                    <?php
                    }
                
                    }
	            ?>    
                <span style="position:absolute; right:15%;top:50%;font-size:12px"><?php echo $lname?></span>
                <button type="submit" class="logoutbtn" onclick="logOut()"><b>Log Out</b></button>
                <?php
                }
                else if($position == "Admin" && $email=="webstar@gmail.com" && $password=="7af2d10b73ab7cd8f603937f7697cb5fe432c7ff"){
                     header("location: dashboard.php");

                
                     
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
		</div>
 <div class="topnav mb-3 mt-4">
        <a href="landingpage.php">LOGIN</a>
        <a href="registration.php">REGISTRATION</a>
        
   
    </div>
</div>
  <div class="thing">
      
      </div>
<p class="mb-100 mt-10"><br>
        
            <form name="signupform" action="../html/register.php" onSubmit="return signupformValidation();" method="POST">
            <!--Text Field Container-->
			<div class="containersignup">
                <!--Hearder-->
                <h2 align="center">Sign Up</h2>
                <!--Position-->
                <div class="rowlogin">
                    <span class="material-icons">perm_identity</span>
                    <span>
                        <select id="position" name="position" class="position">
                            <option value="Student">Student</option>
                            <option value="Lecturer">Lecturer</option>
                            <option value="Supervisor">Supervisor</option>
                   <!--     <option value="Admin">Admin</option>   -->       
                        </select>
                    </span>
                </div>
                <!--First Name-->
                <div class="rowsignup"><span>Full Name:</span>
                <input type="text" class="inputTextsignup" placeholder="e.g. your name" name="lastname" required>
           		</div>
				<!--Last Name-->
                <div class="rowsignup"><span>Race:</span>
                    <select id="hours" class="inputTextsignupp" name="firstname">
                         <option value="MALAY">MALAY</option>
                         <option value="CHINESE">CHINESE</option>
                         <option value="INDIAN">INDIAN</option>
                         <option value="BUMIPUTERA">BUMIPUTERA</option>
                         <option value="OTHERS">OTHERS</option>
                     </select>
                
             <!--   <input type="text" class="inputTextsignup" placeholder="e.g. parent/family name" name="firstname" required> -->
           		</div>
                <!--Email-->
                <div class="rowsignup"><span>Email:</span>
                    <input type="text" class="inputTextsignup"
						   placeholder="e.g. abc@gmail.com" name="email" required>
                </div>
                <!--IC Number-->
                <div class="rowsignup"><span>IC/Passport Number:</span>
                <input type="text" class="inputTextsignup" placeholder="e.g. 980302042345/A000000" name="ic" required>
           		</div>
           		<!--Phone Number-->
                <div class="rowsignup"><span>Phone Number:</span>
                <input type="text" class="inputTextsignup" placeholder="e.g. 0117573987" name="phonenumber" required>
           		</div>
                <!--Password-->
                <div class="rowsignup"><span>Password:</span>
                    <input type="password" class="inputTextsignup" placeholder="e.g. ABCdef123" name="password" required>
                </div>
				<!--Confirm Password-->
                <div class="rowsignup"><span>Confirm Password:</span>
                    <input type="password" class="inputTextsignup" placeholder="e.g. ABCdef123" name="cpassword" required>
                </div>
                <!--Button-->
                <div class="rowsignup" align="center">
                    <input type="submit" class="submitsignup" name="signup" value="Sign Up">
                </div>
            </div>
			<!--Hypertext-->
            <div class="hypertextsignup">
				Already have account?
                <a href="https://crimsonwebs.com/s272043/OPL/html/landingpage.php">
                   Login Now
                </a>
            </div>
			</form>



    
	
	</div>
       
<p class="mb-100 mt-10"><br>
    <h1 style="text-align:center;" class="display-4">Features</h1><br>
    <p align=center>
        
     <div class="row">
 
  
  	</div>

	
    <!------------------------Call Aunthentication------------------------>
	<div id="bgmodalSignUp"></div>
	<div id="bgmodalForget"></div>
	<!------------------------Call Aunthentication------------------------>


</body>
</html>