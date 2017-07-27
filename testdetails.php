<!-- 
<?php 
$DB = 'usr';
$DB_USER = 'mudhaffarno';
$DB_PASS = 'V00634608';
$DB_CHAR = 'Noha';
$conn = oci_connect($DB_USER, $DB_PASS, $DB, $DB_CHAR);
    session_start();
    
?>
 -->
<!-- <!Doctype html> -->
<html>
	<head>
		<title>Test Details</title>
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
					<li><a href="login.php">Staff Login</a></li>
					<li><a href="donar.php">Donar</a></li>
					<li><a href="signup.php">Staff SignUp</a></li>
					<li><a href="admin.php">Admin LogIn</a></li>  

					<?php } ?>

				</ul>
			</div>
		</div>   



			<div class="outside">
				<form action="testdetails.php" class="form-horizontal" role="form" method="post">
                   
                    <!-- <div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="tid"></label>
						<div class="control-label col-sm-8">
							<input type="number" name="_tid" class="form-control" id="tid" placeholder="Test ID">
						</div>
					</div>
 -->


					<!-- <div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="sid"></label>
						<div class="control-label col-sm-8">
							<input type="number" name="_sid" class="form-control" id="sid" placeholder="Staff ID">
						</div>
					</div> -->

					<!-- <div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="did"></label>
						<div class="control-label col-sm-8">
							<input type="number" name="_did" class="form-control" id="did" placeholder="Donar ID">
						</div>
					</div> -->

					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="did"></label>
						<div class="control-label col-sm-8">

							<select name = "did" class="form-control" placeholder="Enter Order Number"> 
							<?php 
							 $conn = include("connect.php");
                          	$stid = oci_parse($conn, 'SELECT D_ID FROM donor');
								oci_execute($stid);
						  ?>  <option value="">Select Donor ID</option> <?php 
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



					
					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="testresult"></label>
						<div class="control-label col-sm-8">
							<select name="testresult" class="form-control"> 
							<option value="">Select TestReslut</option>
							<option value="Positive">Positive</option>
							<option value="Negative">Negative</option>
							</select>
							<!-- <input type="text" name="_testresult" class="form-control" id="testresult" placeholder="Test Result"> -->
						</div>
					</div>
					
					
					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="bloodgroup"></label>
						<div class="control-label col-sm-8">
							<select name="bloodgroup" class="form-control"> 
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
					</div>


					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="quantity"></label>
						<div class="control-label col-sm-8">
							<select name="quantity" class="form-control"> 
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
        require_once 'MDB2.php';

		 $dsn = array ( 
		'phptype'  => 'oci8',
		'hostspec' => 'localhost:20037/xe',
		'username' => 'medapr',
		'password' => 'V00763199',
		);


			$mdb2 =& MDB2::connect($dsn);
			if (PEAR::isError($mdb2)) {
			    die($mdb2->getMessage());
                }

        // $conn = oci_connect('medapr', 'V00763199', 'localhost:20037/xe');
                 $conn = include("connect.php");

            if(isset($_POST['submit'])) 

            {
                // $tid = $_POST['_tid'];             // Dr.cano , we want to make this auto increment 
                // $sid = $_POST['_sid'];
                $tid = $mdb2->nextID('test');
                print_r($tid);
				if (PEAR::isError($tid)) {
				    die($id->getMessage());
				}
                $did = $_POST['did'];
                $testresult = $_POST['testresult'];
                $bloodgroup = $_POST['bloodgroup'];
                $quantity = $_POST['quantity'];
                // echo $quantity;

                $staff_mail= $_SESSION['user_email'];
                
                if(empty($did) || empty($testresult)|| empty($bloodgroup) || empty($quantity) ){
                    echo "<script>alert('All feilds are required!')</script>";
                   }
                
                else
                {
					            
		
                	$parse_staff = oci_parse($conn,"SELECT S_ID from staff where email = '$staff_mail' ") ;
                	oci_execute($parse_staff);
                	$sid = oci_fetch_object($parse_staff);
                	 $vid =  $sid->S_ID ;
 
                 $insert= oci_parse($conn, "INSERT INTO blood_test(T_ID,S_ID,D_ID,testresult,bloodgroup,quantity)
                    VALUES('$tid','$vid','$did','$testresult','$bloodgroup','$quantity')" ) ;
                     //  DR. cano we want to use seq_test.nextval instead of '$tid'
				$insertExec = oci_execute($insert);

				//Data Validation
				

				if($insertExec){
                   
                    ?> <h4> Form submitted </h4>

                  <?php

                    $populate_bloodbank = oci_parse($conn, "INSERT INTO blood_bank (S_ID,T_ID,ENTERDATE,EXPIDATE,quantity,Bloodgroup)
                    				select S_ID,T_ID ,sysdate , sysdate+90, quantity , bloodgroup
                    				from blood_test
                    				where testresult = 'Negative' 
									and S_ID = '$vid' and T_ID = '$tid' ") ; 

                    		 // DR.cano, we want to parse the values to retrieve the current recored if it passes the screening test and update in another table blood_bank
			
     	            $ExecBB = oci_execute($populate_bloodbank);
     	           
     	                $rec_exist =   oci_num_rows($populate_bloodbank);

                    if ($rec_exist ==1){

                    ?> <h4> Form saved in blood bank </h4> <?php
                                 }
                      
                      elseif ($rec_exist ==0){
                      	
                    ?> 	<h4> Form screened out of blood bank</h4> <?php
                      }
					
					
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