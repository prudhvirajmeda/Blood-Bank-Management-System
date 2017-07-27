<DOCTYPE HTML!>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Blood Bank Donation Center</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
		<!-- <link rel="stylesheet" href="css/indexStyle.css"> -->
		<style>
.container {
    overflow: hidden;
    background-color: #333;
    font-family: Arial;
}

.container a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.dropdown {
    float: left;
    overflow: hidden;
}

.dropdown .dropbtn {
    font-size: 16px;    
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
}

.container a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
		
	</head>
	<body>
        
		<div class="main-name">
			<h1>Blood Bank Donation Center</h1>
		</div>
		
		<!-- <div class="menu"> -->
		<div class="container">
			 <div class="div-right"> 
				<ul class="pull-right">
					<?php
					session_start();
					if(!empty($_SESSION['user_email']))
						{ ?>
                   <a href="updateInfo.php"><?php $email=$_SESSION['user_email']; echo "$email"; ?></a>
                  
					
					<div class="dropdown">
						 <button class="dropbtn">Forms</button>
						 	<div class="dropdown-content">
								<a href="donar.php" name="_Donar">Donor</a>
								<a href="testdetails.php" name="_Testdetails">Test Details</a>
								<a href="BloodRequest.php">Blood Request</a>
							</div>
					</div>

					<div class="dropdown">
						 <button class="dropbtn">View</button>
						 	<div class="dropdown-content">
						 		<a href="check_blood.php">Check Blood</a>
						 		<a href="BloodRequestView.php" name="_viewbloodrequest"> View Blood Request</a>
						 		<a href="shipment.php" name="_shipment">Shipped Requests</a>
						 		<a href="donor_test_view.php" name="_viewtestresults">View Test Results</a>
								
							</div>
					</div>

				
					<a href="Process.php" name="_Process">Process</a>
					<a href="logout.php" name="_logout">Logout</a>
					
					

                    <?php } 

                    
					else { ?>
					<a href="login.php">Staff Login</a>
					<!-- <li><a href="donar.php">Donar</a></li> -->
					<a href="signup.php">Staff SignUp</a>
					<a href="check_blood.php">Check Blood</a>
					<a href="BloodRequest.php">Blood Request</a>
					<!-- <li><a href="admin.php">Admin LogIn</a></li>   -->

					<?php } ?>

				</ul>
			</div> 
		</div>   
	</body>
</html>
