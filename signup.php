


<html>
	<head>
		<title>SignUp</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/signUpCSS.css">
	</head>
	
	<body>
			<div class="outside">
				<form action="signup.php" class="form-horizontal" role="form" method="post">
                   
                   
					
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
					
					<div class="form-group">
						<label class="control-label col-sm-3" for="email">
							<img class="glyphicon1" src="at-sign.png">
						</label>
						<div class="control-label col-sm-8">
							<input type="email" name="_email" class="form-control" id="email" placeholder="Enter Email">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-lock" for="password"></label>
						<div class="control-label col-sm-8">
							<input type="password" name="_password" class="form-control" id="password" placeholder="Enter Password">
						</div>
					</div>
					
                    <div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-lock" for="password"></label>
						<div class="control-label col-sm-8">
							<input type="password" name="_ConfirmPassword" class="form-control" id="password" placeholder="Confirm Password">
						</div>
					</div>                    
                    
  					<div class="form-group"> 
    					<div class="col-sm-offset-3 col-sm-3">
      						<button name="submit" id="submit" type="submit" class="btn btn-default">Confirm SignUp</button>
    					</div>
  					</div>
					  <p>Already a User? <a href="login.php">LogIn</a></p>
				</form>
		</div>
        
        <?php
        session_start();
        $conn = oci_connect('medapr', 'V00763199', 'localhost:20037/xe');
            if(isset($_POST['submit'])) 

            {
                // $sid = $_POST['_sid'];
                $fname = $_POST['_fname'];
                $lname =$_POST['_lname'];
                $email = $_POST['_email'];
                $pass = $_POST['_password'];
                $password = $_POST['_ConfirmPassword'];
                
                if( empty($fname) || empty($lname) || empty($email) || empty($pass) || empty($password)){
                    echo "<script>alert('All feilds are required!')</script>";
                }
                elseif($pass!=$password){
                    echo "<script>alert('Both Password Does not match')</script>";
                }
                else
                {
					            
                $insert = oci_parse($conn,"INSERT INTO staff(S_ID,Firstname,Lastname,Email,Password)
                    VALUES(staff_seq.nextval,'$fname','$lname','$email','$pass')"); 
                // $stid = oci_parse($conn, '$insert ');
				$insertExec = oci_execute($insert);
                
				//Data Validation
				if($insertExec){
                    $_SESSION['user_email'] = $email;
					header('Location: index.php');
					
				               }
				else{ 
					echo "<script>window.alert('You are already a user.')</script>";
				    }
                 }	
			}
			     //oci_close($conn);
                
        ?>
        
	</body>
</html>