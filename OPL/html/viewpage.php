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

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

	
	<title>Logbook List</title>
	
	
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
    
    td{
  border: 1px solid black;
  text-align: center;
  padding: 8px;
}

th {
  border: 1px solid black;
    background-color: #bedff6;
  text-align: center;
  padding: 8px;
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
             $sqlloaduser = "SELECT * FROM tbl_272043_lecturer WHERE email = '$email' AND password = '$password' ";
                $result = $conn->query($sqlloaduser);
                if ($result->num_rows > 0 && $position == "Lecturer") {
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
             $sqlloaduser = "SELECT * FROM tbl_272043_lecturer WHERE email = '$email' AND password = '$password' ";
                $result = $conn->query($sqlloaduser);
                if ($result->num_rows > 0 && $position == "Lecturer") {
                ?>
               		</div>
 <div class="topnav mb-3 mt-4">
        <a href="dashboardlec.php">Dashboard</a>
        <a href="viewstudentlog.php">View Logbook</a>
        <a href="lecprofile.php">My Profile</a>
       
        
   
    </div>
</div>
<div>
<h2 style="text-align:center; font-size: 50px; margin-top: 0.15em; margin-bottom: -1em;"><?php echo $_GET["studentname"]; ?>'s Logbook List</h2>
</div><br><br><br>
<div class="select" >
    <?php
        session_start();
        error_reporting(0);
        include("dbconnect.php");
         $datetime = $_SESSION['datetime'];
        $email = $_SESSION['email'];
        $studentemail=$_GET["studentemail"];
        $month =$_POST['month'];
       
         $sqlloaduser = "SELECT * FROM tbl_272043_logbook WHERE email ='$studentemail'";
         
         
         
     if(isset($_POST['sortyear'])){

            $sqlloaduser = "SELECT * FROM tbl_272043_logbook WHERE month ='$month' AND email ='$studentemail'";
        }
      
    ?>

	<form method="post">
	    <select class="month" name="month" >
          <option value="Jan"<?php if($month=='Jan'){echo "selected='selected'";} ?>>January&nbsp  </option>
          <option value="Feb"<?php if($month=='Feb'){echo "selected='selected'";} ?>>February&nbsp  </option>
          <option value="Mar"<?php if($month=='Mar'){echo "selected='selected'";} ?>>March&nbsp  </option>
          <option value="Apr"<?php if($month=='Apr'){echo "selected='selected'";} ?>>April&nbsp  </option>
          <option value="May"<?php if($month=='May'){echo "selected='selected'";} ?>>May&nbsp  </option>
          <option value="Jun"<?php if($month=='Jun'){echo "selected='selected'";} ?>>June&nbsp  </option>
          <option value="Jul"<?php if($month=='Jul'){echo "selected='selected'";} ?>>July&nbsp  </option>
          <option value="Aug"<?php if($month=='Aug'){echo "selected='selected'";} ?>>August&nbsp  </option>
          <option value="Sep"<?php if($month=='Sep'){echo "selected='selected'";} ?>>September&nbsp  </option>
          <option value="Oct"<?php if($month=='Oct'){echo "selected='selected'";} ?>>October&nbsp  </option>
          <option value="Nov"<?php if($month=='Nov'){echo "selected='selected'";} ?>>November&nbsp  </option>
          <option value="Dec"<?php if($month=='Dec'){echo "selected='selected'";} ?>>December&nbsp  </option>
        </select>
    <input type="submit" class="sortbtn" value="Filter" name="sortyear">
	</form>

</div><br>
  
<div class="container2">
	
	<table id="example"  style="width:100%">
        <thead>
            <tr>
                <th>Date Time</th>
                <th>DateDay</th>
                <th>Email</th>
                <th>Logbook ID</th>
                <th>Status</th>
                <th>View</th>
         
            </tr>
        </thead>
        <tbody>
        <?php
/*	    session_start();
        error_reporting(0);
        include("dbconnect.php");
        $email = $_SESSION['email'];
        $studentemail=$_GET["studentemail"];
	    $sqlloaduser = "SELECT * FROM tbl_272043_logbook WHERE email='$studentemail'";          */
	    
	     $result = $conn->query($sqlloaduser);
	    if ($result->num_rows > 0){
	        while ($row = $result -> fetch_assoc()){
	        extract ($row);
	            ?>
	   <tr>
	       
                <td><?php echo $row["datetime"] ?></td>
                <td><?php echo $row["dateday"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["logid"] ?></td>
                <td><?php echo $row["status"] ?></td>
                <td><a href="viewlogbook.php?logid=<?php echo $row["logid"]; ?>&studentname=<?php echo $_GET["studentname"]; ?>&studentemail=<?php echo $row["email"]; ?>"><button type="button" >View</button></a></td>
               
               
            <?php
	        }
	    }
          ?>  
        </tbody>
        <tfoot>
            <tr>
                <th>Date Time</th>
                <th>DateDay</th>
                <th>Email</th>
                <th>Logbook ID</th>
                <th>Status</th>
                <th>View</th>
            </tr>
        </tfoot>
    </table>
    

    </div>
	

    
	
	</div>
                <?php
                }
                else if($position == "Admin" && $email=="webstar@gmail.com" && $password=="7af2d10b73ab7cd8f603937f7697cb5fe432c7ff"){
                ?>
             <div class="container2">
	
	<table id="example"  style="width:100%">
        <thead>
            <tr>
                <th>Date Time</th>
                <th>Email</th>
                <th>Name</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Activity</th>
            </tr>
        </thead>
        <tbody>
        <?php
	    session_start();
        error_reporting(0);
        include("dbconnect.php");
        $email = $_SESSION['email'];
        
	    $sqlloaduser = "SELECT * FROM tbl_action WHERE email='$email'";
	    
	     $result = $conn->query($sqlloaduser);
	    if ($result->num_rows > 0){
	        while ($row = $result -> fetch_assoc()){
	        extract ($row);
	            ?>
	   <tr>
	       
               <td><?php echo $datetime ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $fname ?> <?php echo $lname ?></td>
                <td><?php echo $latitude ?></td>
                <td><?php echo $longitude ?></td>
                <td><?php echo $status ?></td>
               
            <?php
	        }
	    }
          ?>  
        </tbody>
        <tfoot>
            <tr>
                <th>Date Time</th>
                <th>Email</th>
                <th>Name</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Activity</th>
        </tfoot>
    </table>
    

    </div>
	

    
	
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


		

	
    <!------------------------Call Aunthentication------------------------>
	<div id="bgmodalSignUp"></div>
	<div id="bgmodalForget"></div>
	<!------------------------Call Aunthentication------------------------>


</body>
</html>