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
    
    $sqlloaduser = "SELECT * FROM tbl_272043_logbook WHERE logid=$logid";
    $result = $conn->query($sqlloaduser);
    	    if ($result->num_rows > 0){
	        while ($row = $result -> fetch_assoc()){
	        extract ($row);
	        }
	    }


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Logbook</title>
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/form.css">
	<!--Import Icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!--Import Other Class-->
    <script src="//code.jquery.com/jquery.min.js"></script>

    <!------------------------Call Nav------------------------>
    <link rel="stylesheet" href="../css/adminnavi.css">
    <link rel="stylesheet" href="../css/usernavi.css">
    <link rel="stylesheet" href="../css/homepage.css">
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
    <link rel="stylesheet" href="../css/form.css">
    <script src="../js/checkButton.js"></script>
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

textarea {
  resize: none;
}

.inbtn {
  width: 300px;
  background-color: green;
  color: black;
  border: grey;
  font-size:20px;
  cursor: pointer;
  border-radius: 40px;

}

.outbtn {
  width: 300px;
  background-color: red;
  color: black;
  border: grey;
  font-size:20px;
  cursor: pointer;
  border-radius: 40px;
  
  
}

    </style>
</head>

<body onload = "getLocation();">
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
                if ($result->num_rows > 0 && $position == "Student") {
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
                else if($position == "Admin" && $email=="phitsanuk66@gmail.com" && $password=="4d222fee3f5d40cd3591f7151681ce4e305efe4e"){
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
             $sqlloaduser = "SELECT * FROM tbl_272043_student WHERE email = '$email' AND password = '$password' ";
                $result = $conn->query($sqlloaduser);
                if ($result->num_rows > 0 && $position == "Student") {
                ?>
               </div>
 <div class="topnav mb-3 mt-4">
        <a href="dashboard.php">Dashboard</a>
        <a href="action.php">Add Today Log</a>
        <a href="actionReport.php">Logbook List</a>
        <a href="addlocation.php">Check In Location</a>
        <a href="myprofile.php"> My Profile</a> 
   
    </div>


	     
	       
    
    <div style="padding-left: 500px; margin-bottom: 50px;">


    
	</div>
                    
                    <form class="myForm1" action="actionupdate.php?logid=<?php echo $_GET["logid"]?>" method="POST" enctype="multipart/form-data">
            <!--Text Field Container-->
			<div class="containersignup3">
                <!--Hearder-->
                <h2 align="center">ADD LOGBOOK</h2>
                <!--First Name-->
                <div class="rowsignup"><span>Work Done:</span>
                <textarea rows="15" cols="72" name="workdone" placeholder="Please enter what you have done" required><?php echo $workdone; ?></textarea>
           		</div>
				<!--Last Name-->
                <div class="rowsignup"><span>Hours Work:</span>
                                    <select id="hours" class="inputTextHoursWork2" name="hourswork">
                         <option value="<?php echo $hourswork; ?>"><?php echo $hourswork; ?></option>
                         <option value="0 hour">0 Hour</option>
                         <option value="1 hour">1 Hour</option>
                         <option value="2 hour">2 Hours</option>
                         <option value="3 hour">3 Hours</option>
                         <option value="4 hour">4 Hours</option>
                         <option value="5 hour">5 Hour</option>
                         <option value="6 hour">6 Hours</option>
                         <option value="7 hour">7 Hours</option>
                         <option value="8 hour">8 Hours</option>
                         <option value="9 hour">9 Hours</option>
                         <option value="10 hour">10 Hours</option>
                     </select>
                
           <!--     <input type="text" class="inputTextHoursWork" placeholder="HoursWork" name="hourswork" value="<?php echo $hourswork; ?>" required>-->
           		</div>
                <!--Email-->
                <div class="rowsignup"><span>Date Day:</span>
                
                                    <select id="date" class="inputTextHoursWork2" name="dateday">
                            <option value="<?php echo $dateday; ?>"><?php echo $dateday; ?></option>
                         <option value="Monday">Monday</option>
                         <option value="Teusday">Teusday</option>
                         <option value="Wednesday">Wednesday</option>
                         <option value="Thursday">Thursday</option>
                         <option value="Friday">Friday</option>
                         <option value="Saturday">Saturday</option>
                         <option value="Sunday">Sunday</option>
                     </select>
                
                
            <!--        <input type="text" class="inputTextDateDay" placeholder="DateDay" name="dateday" value="<?php echo $dateday; ?>" required> -->
                </div>
                <!--Password-->
                <div class="rowsignup"><span>Remark:</span>
                    <textarea rows="10" cols="72" name="remark" placeholder="Please enter what you have learn"  required><?php echo $remark; ?></textarea>
                </div>
                <div class="rowsignup"><span>File:</span>
                   		<?php
	    session_start();
        error_reporting(0);
        include("dbconnect.php");
        $logid=$_GET["logid"];
         $sqlloaduser = "SELECT * FROM tbl_272043_logbook WHERE logid=$logid";
    $result = $conn->query($sqlloaduser);
	    if ($result->num_rows > 0){
	        while ($row = $result -> fetch_assoc()){
	        extract ($row);
	        if(isset($pic)){
	    ?>
		    <img src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($pic); ?>" style= "height: 200px; width:350px; display: block; margin-top: 10px; margin-left: 100px;margin-right: auto; border-radius:5%">
		<?php
		    }else{
		        ?>
		        <img style= "height: 200px; width:350px; display: block;margin-top: 10px; margin-left:100px;margin-right: auto; border-radius:5%" src="../images/no-image.png" alt="img">
		        <?php
		    }
	    ?>
		<?php
	        }}?>
                </div>
                <div class="rowsignup3" align="center"><span>Select A File To Change</span>
                    
                </div>
				<div class="rowsignup2"><span></span>
		    <input style="position:absolute;left:20%;margin-top: 13px; color:white" type="file" name="image" accept="image/*" >
                </div>
                <!--Comment-->
                               <div class="rowsignup"><span>Supervisor Comment:</span>
                    <textarea rows="10" cols="72" name="supcom" placeholder="Please wait supervisor to comment"  readonly><?php echo $comment; ?></textarea>
                </div>
                <!--Button-->
                <div class="rowsignupB2" align="center">
                    <input type="submit" class="submitsignup3" style="margin-right: 70px; width: 200px; height: 35px; font-weight: bold; border-width: 0 0 1px; border-radius: 5px; background: #2296F3; cursor: pointer; color: #ffffff;" name="submitok" value="Back">
                    <input type="submit" class="submitsignup4" style="width: 200px; height: 35px; font-weight: bold; border-width: 0 0 1px; border-radius: 5px; background: #2296F3; cursor: pointer; color: #ffffff;" name="submit" onclick="return confirm('Are you sure want to update?')" value="Update">
                </div>
            </div>
			</form>
                <?php
                }
                else if($position == "Admin" && $email=="webstar@gmail.com" && $password=="4d222fee3f5d40cd3591f7151681ce4e305efe4e"){
                ?>
                <div id="adminnavbar"></div>
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

    

		<br><br>
		<?php
	    session_start();
        error_reporting(0);
        include("dbconnect.php");
        $email = $_SESSION['email'];
      
	    $sqlloaduser = "SELECT * FROM tbl_user WHERE email='$email'";
	    
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
	
		<?php
	        }}?>
	</div>



 
	<!------------------------Call Aunthentication------------------------>
	<div id="bgmodalSignUp"></div>
	<div id="bgmodalForget"></div>
	<!------------------------Call Aunthentication------------------------>
	
	
</body>
</html>