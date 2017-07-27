



<html>
	<head>
		<title>Login System</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="css/loginCSS.css">
	</head>
	
	<body>
			<div class="outside">
				<form class="form-horizontal" role="form" method="post">
					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="email"></label>
						<div class="control-label col-sm-8">
							<input type="_email" name="_email" class="form-control" id="email" placeholder="Enter Email">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-lock" for="password"></label>
						<div class="control-label col-sm-8">
							<input type="password" name="_password" class="form-control" id="password" placeholder="Enter Password">
						</div>
					</div>
  					<div class="form-group"> 
    					<div class="col-sm-offset-3 col-sm-3">
      						<button name="_submit" type="submit" class="btn btn-default" >Login</button>
    					</div>
  					</div>
				</form>
				<p>Not a User? <a href="signup.php">Sign Up</a></p>
			</div>
            <?php 
            session_start();
            $conn = oci_connect('medapr', 'V00763199', 'localhost:20037/xe');
            if(isset($_POST['_submit'])){
				
				if(empty($_POST['_email']) || empty($_POST['_password'])){
					echo "<script>window.alert('Invalid User EMAIL or PASSWORD!')</script>";
				}
				else{
					
					$email = $_POST['_email'];
					$password = $_POST['_password'];
					
					$select_user = oci_parse($conn,"SELECT Email,Password FROM staff WHERE Email='$email' AND Password='$password'");
					oci_execute($select_user);
					$rows = oci_fetch_row($select_user);
					
					if($rows>0){
						$_SESSION['user_email'] = $email;
						header('Location: index.php');
					}
					else{
						echo "<script>window.alert('Invalid User EMAIL or PASSWORD!')</script>";
					}
					
				}
			}
			// oci_close($conn);
		?>
	</body>
</html>   