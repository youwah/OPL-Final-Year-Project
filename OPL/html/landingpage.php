

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
             $sqlloaduser = "SELECT * FROM tbl_272043_student WHERE email = '$email' AND password = '$password' ";
                $result = $conn->query($sqlloaduser);
                
             $sqlloaduser2 = "SELECT * FROM tbl_272043_lecturer WHERE email = '$email' AND password = '$password' ";
                $result2 = $conn->query($sqlloaduser2);
                
             $sqlloaduser3 = "SELECT * FROM tbl_272043_supervisor WHERE email = '$email' AND password = '$password' ";
                $result3 = $conn->query($sqlloaduser3);
                
             $sqlloaduser4 = "SELECT * FROM tbl_272043_admin WHERE email = '$email' AND password = '$password' ";
                $result4 = $conn->query($sqlloaduser4);
                
                if ($result->num_rows > 0 && $position == "Student") {
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
                
                }else if ($result2->num_rows > 0 && $position == "Lecturer") {
                    header("location: dashboardlec.php");
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
                
                }else if ($result3->num_rows > 0 && $position == "Supervisor") {
                    header("location: dashboardsup.php");
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
                
                }else if ($result4->num_rows > 0 && $position == "Admin") {
                    header("location: dashboardadmin.php");
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
  <div class="thing" style="margin-bottom: 40px;">
      
      </div>
<p class="mb-100 mt-10"><br>
        
	<form name="loginform" action="../html/userauthentication/verify.php"onSubmit="return loginformValidation();" method="POST">
			<!--Text Field Container-->
			<div class="containerlogin">
                <!--Hearder-->
                <h2 align="center">Login</h2>
                <!--Position-->
                <div class="rowlogin">
                    <span class="material-icons">perm_identity</span>
                    <span>
                        <select id="position" name="position" class="position">
                            <option value="Student">Student</option>
                            <option value="Lecturer">Lecturer</option>
                            <option value="Supervisor">Supervisor</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </span>
                </div>
                <!--Email-->
                <div class="rowlogin"><span class="material-icons">email</span>
                    <input type="text" class="inputTextlogin" placeholder="Email" name="email" required>
                </div>
                <!--Password-->
                <div class="rowlogin"><span class="material-icons">lock</span>
                    <input type="password" class="inputTextlogin" placeholder="Password" name="password" required>
                </div>
                <!--Button-->
                <div class="rowlogin" align="center">
                    <input type="submit" class="submitlogin" name="login" value="Login">
                </div>

			<!--Hypertext-->
            <div class="hypertextlogin">
                <a href="#" class="hypertextlogin" onclick="openForgetForm();">
                    Forget Password
                </a>
            </div>
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