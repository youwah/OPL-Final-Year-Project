<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");
   
    $email = $_SESSION['email'];
    $lname = $_POST['lname'];
    $status = $_POST['status'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    
if (isset($_POST['check_in'])){
    
    if(empty($email)){
            echo "<script type='text/javascript'>alert('Please login to perform this function!');window.location.assign('addlocation.php');</script>'";
    } else{
        $sqlsearch = "SELECT * FROM `tbl_272043_location` WHERE email = '$email' &&  `lname`='$lname' &&  `status`='$status'  &&  `latitude`='$latitude' &&  `longitude`='$longitude' ";
        $result = $conn->query($sqlsearch);
        
            $checkin = "INSERT INTO `tbl_272043_location`(`email`,`lname`,`status`,`latitude`,`longitude`) VALUES('$email','$lname','$status','$latitude','$longitude')";
            if(mysqli_query($conn, $checkin)){
            echo  "<script type='text/javascript'>alert('Success!');window.location.assign('dashboard.php');</script>'";
            }
            else{
                echo "<script type='text/javascript'>alert('Failed!!');window.location.assign('addlocation.php');</script>'";
            }
        
    }
}

    // if(isset($_POST['addfav'])){
    //   // $query = "INSERT INTO `tbl_favourite`(universityID,email)VALUES($universityID,$email)";
    //     $query = "INSERT INTO `tbl_favourite`(`universityID`, `email`) VALUES('$universityID','$email')";
    //     if(mysqli_query($conn, $query))
    //     {
    //       echo "<script type='text/javascript'>alert('Success!');window.location.assign('uniRanking.php');</script>'";
    //     }else{
    //      echo "<script type='text/javascript'>alert('Failed!!');window.location.assign('uniRanking.php');</script>'";
    //     }
    // }

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Location Track</title>
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

.flex-parent {
  display: flex;
}

.jc-center {
  justify-content: center;
}

button.margin-right {
  background-color: #2296F3;
color: white;
padding: 8px 15px;
font-size: 16px;
border: none;
box-shadow: 2px 4px grey;
cursor: pointer;
margin-top:10px;
margin-bottom:30px;
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
				<p class="mb-100 mt-10"><br>
    <h2 style="text-align:center;" class="display-4">LOCATION TRAKER</h2><br>
    <h3 style="text-align:center;" class="display-4">You can see the intern location in the Google Map</h3>
  
 		<br><br>
	
	</div>
	<form method="post">
	    <?php
	    session_start();
        error_reporting(0);
        include("dbconnect.php");
      
       $latitude=$_GET["latitude"];
       $longitude=$_GET["longitude"]; 

	    
	            ?>
	  
</div>
	
	        
	        
	    
	    ?>
	</form>


	 
	 <div id="map" style="text-align: center; margin-top: 10px">
	 <!--    <iframe id="google_map" width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.uk?output=embed"></iframe>  -->
	     <iframe id="google_map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8149951.081620796!2d105.10962300456228!3d4.127865779299867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3034d3975f6730af%3A0x745969328211cd8!2sMalaysia!5e0!3m2!1sen!2smy!4v1642399241335!5m2!1sen!2smy" width="425" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	 </div>
	 <p id="demo"></p>
	 
	 <script>
	 
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
    
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
 document.getElementById('google_map').setAttribute('src','https://maps.google.com/maps?q=' + <?php echo $latitude?> + ',' + <?php echo $longitude?> +'&z=60&output=embed');
 document.querySelector('.myForm input[name="latitude"]').value = <?php echo $latitude?>;
 document.querySelector('.myForm input[name="longitude"]').value = <?php echo $longitude?>;
}


	 </script>


	     
	         <script>

        var c = function(pos){
            var lat = pos.coords.latitude,
                long = pos.coords.longitude,
                coords = lat +', '+long;
            document.getElementById('google_map').setAttribute('src','https://maps.google.com/maps?q='+ coords +'&z=60&output=embed');
            alert("latitude= "+lat+"\nlongitude= "+long);
            $.ajax({
    type: 'POST',
    url: 'dbconnect.php', 
    async:true,
    data: { 
        'lat': lat, 
        'lang': lang 
    },
    success: function(response){
       // alert('wow' + msg);
    }
});

        }//end of function c
        document.getElementById('get_location').onclick = function(){

            navigator.geolocation.getCurrentPosition(c);
            return false;
        }//end of document.getElementById()
    </script>
    
    <div class="flex-parent jc-center">

  <button type="submit" onclick="document.location='checklocation.php?studentemail=<?php echo $_GET["studentemail"]; ?>&studentname=<?php echo $_GET["studentname"]; ?>'" class="green margin-right">Back</button>
    <script>
 function checkButton(){

   alert("Please make sure you have track your location!");

}
    </script>

    <p align=center>
        
        
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

    
	<!------------------------Call Aunthentication------------------------>
	<div id="bgmodalSignUp"></div>
	<div id="bgmodalForget"></div>
	<!------------------------Call Aunthentication------------------------>
	
	
</body>
</html>