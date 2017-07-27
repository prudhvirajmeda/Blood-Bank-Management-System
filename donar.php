
<!-- <!Doctype html> -->
<html>
	<head>
		<title>donar</title>
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/signUpCSS.css">
	</head>
	
	<body>


		<div class="menu">
			<div class="div-right">
				<style>
					ul#menu li {
					    display:inline;
					}
					</style>
				<ul class="pull-right"  id="menu"> 
					<!-- <ul id="menu"> -->
					<?php
					session_start();
					// echo $_SESSION['user_email'];
					if(!empty($_SESSION['user_email'])){ ?>
                    	
                    	<li><a href="updateInfo.php">
                    	<?php $email=$_SESSION['user_email']; 
                    	echo "$email"; ?></a></li>
                    <li><a href="index.php" name="_home">Home</a></li>
                    <li><a href="testdetails.php" name="_Testdetails">Test Details</a></li>
					<li><a href="logout.php" name="_logout">Logout</a></li>
					

					

					<!-- <li><a href="donar.php" name="_Donar">Donar</a></li> -->
                    <?php } 

                    

					else { ?>
					<!-- <li><a href="login.php">Staff Login</a></li>
					<li><a href="donar.php">Donar</a></li>
					<li><a href="signup.php">Staff SignUp</a></li> -->
					<li><a href="logout.php" name="_logout">Logout</a></li>
					<li><a href="index.php" name="_home">Home</a></li>
					

					<?php } ?>

				</ul>
			</div>
		</div>   



			<div class="outside">
				<form action="donar.php" class="form-horizontal" role="form" method="post">
                   
                    <!-- <div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="did"></label>
						<div class="control-label col-sm-8">
							<input type="number" name="_did" class="form-control" id="did" placeholder="Donar ID">
						</div>
					</div> -->
					
					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="fname"></label>
						<div class="control-label col-sm-8">
							<input type="text" name="_fname" class="form-control" id="fname" placeholder="First Name">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="lname"></label>
						<div class="control-label col-sm-8">
							<input type="text" name="_lname" class="form-control" id="lname" placeholder="Last Name">
						</div>
					</div>
					
					<!-- <div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="bloodgroup"></label>
						<div class="control-label col-sm-8">
							<input type="text" name="_bloodgroup" class="form-control" id="bloodgroup" placeholder="Enter Bloodgroup">
						</div>
					</div> -->

					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="phone"></label>
						<div class="control-label col-sm-8">
							<input type="number" name="_phone" class="form-control" id="phone" placeholder="Enter Phone">
						</div>
					</div>
					
					       
                    
  					<div class="form-group"> 
    					<div class="col-sm-offset-3 col-sm-3">
      						<button name="submit" id="submit" type="submit" class="btn btn-default">Submit</button>
    					</div>
  					</div>
					  <!-- <a href="login.html">LogIn</a> -->
				</form>
		</div>
        
        <?php
        // session_start();
         // $conn = oci_connect('medapr', 'V00763199', 'localhost:20037/xe');
        	 $conn = include("connect.php");
            if(isset($_POST['submit'])) 

            {
                // $did = $_POST['_did'];
                $fname = $_POST['_fname'];
                $lname =$_POST['_lname'];
                // $bloodgroup = $_POST['_bloodgroup'];
                $phone = $_POST['_phone'];
                
                
                if( empty($fname) || empty($lname) ||empty($phone)){
                    echo "<script>alert('All feilds are required!')</script>";
                }
                // elseif($pass!=$password){
                //     echo "<script>alert('Both Password Does not match')</script>";
                // }
                else
                {
					            
                $insert = oci_parse($conn,"INSERT INTO donor(D_ID,Firstname,Lastname,phonenumber)
                    VALUES(seq_Donor.nextval,'$fname','$lname','$phone')"); 
                // $stid = oci_parse($conn, '$insert ');
				$insertExec = oci_execute($insert);
                
				//Data Validation
				if($insertExec){
                    // $_SESSION['user_email'] = $email;

                   ?> <h4> Form submitted </h4>



                    <?php

                    // echo "form submitted" ; 
					// sheader('Location: donar.php');
					
				               }
				else{ 
					echo "<script>window.alert('You are already a user.')</script>";
				    }
                 }	
			}
			     // oci_close($conn);
                
        ?>

	</body>
</html>