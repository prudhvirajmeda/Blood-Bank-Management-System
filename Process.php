<html>
	<head>
		<title>Process</title>
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
					session_start();
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
					
<!-- 					<li><a href="signup.php">Staff SignUp</a></li>  -->
<!-- 					<li><a href="admin.php">Admin LogIn</a></li>    -->

					<?php } ?>

				</ul>
			</div>
		</div>   



			<div class="outside">
			
				<form action="Process.php" class="form-horizontal" role="form" method="post">
		
                    <!-- <div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="Oid"></label>
						<div class="control-label col-sm-8">
							<input type="number" name="_Oid" class="form-control" id="Oid" placeholder="Enter Order Number">
						</div>
					</div>
 -->
					



					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="Oid"></label>
						<div class="control-label col-sm-8">

							<select name="Oid" class="form-control" placeholder="Enter Order Number"> 
							<?php 
							 $conn = include("connect.php");
                          	$stid = oci_parse($conn, 'SELECT ordernum FROM bloodrequest');
								oci_execute($stid);
						  ?>  <option value="">Select OrderNum</option> <?php 
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
    					<div class="col-sm-offset-3 col-sm-3">
      						<button name="submit" id="submit" type="submit" class="btn btn-default">Process</button>
    					</div>
  					</div>
					  <!-- <a href="login.html">LogIn</a> -->
				</form>
		</div>
	
        
        <?php
        // $conn = oci_connect('albalawiw', 'V00770335', 'localhost:20037/xe');
        $conn = include("connect.php");

            if(isset($_POST['submit'])) 

            {
               // $tid = $_POST['_tid'];
                $Oid = $_POST['Oid'];	
                echo $Oid ;
                // $lid = $_POST['lid'];
                // echo $lid;
              	// ECHO  $Oid;           
				$query= oci_parse($conn,"SELECT ordernum from bloodrequest WHERE ordernum = '$Oid'");
				$queryExec = oci_execute($query);
				
				// $rec_exist = oci_num_rows($query);
				// echo $rec_exist;

				$bool= oci_fetch($query); 

				// echo $bool;
				
				if($bool){
				
				
					 $insert= oci_parse($conn,"UPDATE Blood set totalquantity = (select BLOOD.totalquantity - bloodrequest.quantity from bloodrequest ,BlOOD where bloodrequest.BloodGroup =BlOOD.BloodGroup and bloodrequest.ordernum = '$Oid')where BloodGroup = (select bloodrequest.BloodGroup from bloodrequest ,BlOOD where bloodrequest.BloodGroup =BLOOD.BloodGroup and bloodrequest.ordernum =  $Oid )"); 
//     			 // ECHO  $insert 
             		$insertExec = oci_execute($insert);
//             	//echo $insertExec;
// 
 					if($insertExec){
                       $staff_mail= $_SESSION['user_email'];
                       $parse_staff = oci_parse($conn,"SELECT S_ID from staff where email = '$staff_mail' ") ;
                	oci_execute($parse_staff);
                	$sid = oci_fetch_object($parse_staff);
                	 $vid =  $sid->S_ID ;

// 
//                   		?> <h4> Updated Blood Table </h4>  <?php 
                		$insertShip = oci_parse($conn, "INSERT into shipping(ordernum,S_ID) VALUES ((select ordernum from bloodrequest where ordernum = '$Oid'),'$vid' ) ");
 						$Delete= oci_parse($conn,"Delete from BLOODREQUEST where bloodrequest.ordernum = '$Oid'");
 						$insertShip = oci_execute($insertShip);
 						$DeleteExec = oci_execute($Delete);
// 					
 						if($insertShip){
// 							?> <h4> Insert the ordernum in shipping </h4>  <?php 			
// 					//Echo 'Insert the ordernum in shipping';
// 				///echo \r\n;
 						               }
 						
 						if($DeleteExec){
 							?> <h4> Delete the request from  BLOODREQUEST table</h4>  <?php 	
//  					//echo 'Delete the request from  BLOODREQUEST table';
 							           }
 						}


 					 else {
 					 	 ?> <h4> Blood out of stock</h4>  <?php 


 					      }
 					 }
// 				
               // }
				else{
					?> <h4> The ordernum is not in  BLOODREQUEST </h4>  <?php ;
			
				}	
			
			 }
							
			
					
					
?> 

         
	</body>
</html>