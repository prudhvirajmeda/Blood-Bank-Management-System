<html>
	<head>
		<title>Blood Request</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/signUpCSS.css">
	</head>
	
	<body>


		<div class="menu">
			<div class="div-right">
				<ul class="pull-right">
					<?php
					
					if(!empty($_SESSION['user_email'])){ ?>
                    	
                    	<li><a href="updateInfo.php">
                    	<?php $email=$_SESSION['user_email']; 
                    	echo "$email"; ?></a></li>

					<li><a href="logout.php" name="_logout">Logout</a></li>
					<li><a href="index.php" name="_home">Home</a></li>

					<!-- <li><a href="donar.php" name="_Donar">Donar</a></li> -->
                    <?php } 

                    

					else { ?>
<!-- 					<li><a href="login.php">Staff Login</a></li>  -->
 					<li><a href="index.php" name="_home">Home</a></li>
<!-- 					<li><a href="BloodRequest.php">BloodRequest</a></li>  -->
<!-- 					<li><a href="signup.php">Staff SignUp</a></li>  -->
<!-- 					<li><a href="admin.php">Admin LogIn</a></li>    -->

					<?php } ?>

				</ul>
			</div>
		</div>   



			<div class="outside">
			
				<form action="BloodRequest.php" class="form-horizontal" role="form" method="post">
		
                   
                    <!-- <div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="oid"></label>
						<div class="control-label col-sm-8">
							<input type="number" name="_oid" class="form-control" id="oid" placeholder="Order Number">
						</div>
					</div> -->
					
					<!-- <div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="HName"></label>
						<div class="control-label col-sm-8">
							<input type="text" name="_HName" class="form-control" id="HName" placeholder=" Hospital Name">
						</div>
					</div> -->

	<!-- 				<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="HName"></label>
						<div class="control-label col-sm-8">
							<select name="_HName" class="form-control"> 
							<option value="">Select HospitalName</option>
							
							<option value="vcu health care">vcu health care</option>
							<option value="Henrico Doctors Hospital">Henrico Doctors Hospital</option>
							<option value="McGuire Veterans Hospital">McGuire Veterans Hospital</option>
							<option value="West Hospital">West Hospital</option>
							
							<option value="AB-">AB-</option>
							<option value="O+">O+</option>
							<option value="O-">O-</option> -->


							<!-- </select>

						</div>
					</div>  
 -->

					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="HName"></label>
						<div class="control-label col-sm-8">

							<select name="HName" class="form-control" placeholder="Enter Order Number"> 
							<?php 
							 $conn = include("connect.php");
                          	$stid = oci_parse($conn, 'SELECT H_NAME FROM hospital');
								oci_execute($stid);
						  ?>  <option value="">Select HospitalName</option> <?php 
                             while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) :;?>
    <!-- // Use the uppercase column names for the associative array indices -->
                       <option value = "<?php echo $row[0];?>">  <?php echo $row[0] ?></option>

    <!-- // echo $row[1] . " and " . $row['DEPARTMENT_NAME'] . " are the same<br>\n"; -->


                           <?php endwhile;
                           oci_free_statement($stid);

                           ?>
					
							</select>
							<!-- <input type="text" name="_testresult" class="form-control" id="testresult" placeholder="Test Result"> -->
						
						</div>
					</div>

					<!-- <div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="Haddress"></label>
						<div class="control-label col-sm-8">
							<input type="text" name="_Haddress" class="form-control" id="Haddress" placeholder="Hosptial Address">
						</div>
					</div> -->
					
					<!-- <div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="HPhone"></label>
						<div class="control-label col-sm-8">
							<input type="number" name="_HPhone" class="form-control" id="HPhone" placeholder="Hospital Phone">
						</div>
					</div> -->

					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="PName"></label>
						<div class="control-label col-sm-8">
							<input type="text" name="_PName" class="form-control" id="PName" placeholder=" Patient Name">
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="bloodgroup"></label>
						<div class="control-label col-sm-8">
							<select name="_BloodGroup" class="form-control"> 
							<option value="">Select BloodGroup</option>
							
							<option value="A+">A+</option>
							<option value="A-">A-</option>
							<option value="B+">B+</option>
							<option value="B-">B-</option>
							<option value="AB+">AB+</option>
							<option value="AB-">AB-</option>
							<option value="O+">O+</option>
							<option value="O-">O-</option>


							</select>

							<!-- <input type="text" name="_bloodgroup" class="form-control" id="bloodgroup" placeholder="Enter Bloodgroup"> -->
						</div>

					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="quantity"></label>
						<div class="control-label col-sm-8">
							<select name="_quantity" class="form-control"> 
							<option value="">Select Units</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							</select>
							<!-- <input type="text" name="_testresult" class="form-control" id="testresult" placeholder="Test Result"> -->
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
        //$conn = oci_connect('medapr', 'V00763199', 'localhost:20037/xe');
        // $conn = oci_connect('albalawiw', 'V00770335', 'localhost:20037/xe');
         $conn = include("connect.php");

        if(isset($_POST['submit'])) 
 
        	{
                // $Oid = $_POST['_oid'];
                
                $Hname = $_POST['HName'];
                $PName = $_POST['_PName'];
               
                
             
            
                $bloodgroup = $_POST['_BloodGroup'];
             
              	$quantity = $_POST['_quantity'];
            
              	$insert = oci_parse($conn,"INSERT INTO bloodrequest(ordernum,H_Name,P_Name,bloodgroup,quantity,Enterdate)
                     VALUES(bloodrequest_seq.nextval,'$Hname', '$PName', '$bloodgroup','$quantity',sysdate)"); 
                     
            	$insertExec = oci_execute($insert);
            	
            	
            	if($insertExec){
                    // $_SESSION['user_email'] = $email;

                   ?> <h4> Form submitted </h4><?php

              	
              	}
              	}


  			?>        
	</body>
</html>