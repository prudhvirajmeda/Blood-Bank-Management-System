<html>
	<head>
		<title>Submit Donor </title>
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

					<li><a href="index.php" name="_home">Home</a></li>

					

                    elseif(!empty($_SESSION['admin_email'])){ ?>
                    
                   
<!-- 					<li><a href="logout.php" name="_logout">Logout</a></li> -->
					<?php } 

					else { ?>
<!-- 					<li><a href="login.php">Staff Login</a></li> -->
					<li><a href="donor.php">Donar</a></li>
<!-- 					<li><a href="signup.php">Staff SignUp</a></li> -->
<!-- 					<li><a href="admin.php">Admin LogIn</a></li>   -->

					<?php } ?>

				</ul>
			</div>
		</div>   
			<div class="outside">
				<form action="donordelete.php" class="form-horizontal" role="form" method="post">
                   					
					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="Oid"></label>
						<div class="control-label col-sm-8">

					<select name="Oid" class="form-control" placeholder="Enter Donor ID"> 
							<?php 
							$conn = include("connect.php");
                          	$stid = oci_parse($conn, 'SELECT D_ID FROM Donor');
								oci_execute($stid);

                             while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) :;?>
    <!-- // Use the uppercase column names for the associative array indices -->
                       <option value = "<?php echo $row[0];?>">  <?php echo $row[0] ?></option>

    <!-- // echo $row[1] . " and " . $row['DEPARTMENT_NAME'] . " are the same<br>\n"; -->


                           <?php endwhile;
                           oci_free_statement($stid);

                           ?>
					
							</select>


		
  					<div class="form-group"> 
    					<div class="col-sm-offset-3 col-sm-3">
      						<button name="submit" id="submit" type="submit" class="btn btn-default">Delete</button>
    					</div>
  					</div>
	<?php
  	    $conn = include("connect.php");
    //mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
    //mysql_select_db("$db_name")or die("cannot select DB");

    
    if(isset($_POST['submit'])) 

            {
                
                
    		$Oid=$_POST['Oid'];

    //$sql="DELETE FROM $tbl_name WHERE serial_no='$serial_no";
  			$query ="Delete from BLOOD_TEST WHERE D_ID = '$Oid'";
    //$result=mysql_query($sql);
    		$stid = oci_parse($conn, $query);
			$result = oci_execute($stid);


    		if ($result)
    			{
    			
    			$query2 ="Delete from Donor WHERE D_ID = '$Oid'";
    			$stid1 = oci_parse($conn, $query2);
    			oci_execute($stid1);
        		echo "Deleted Successfully";
       		 echo "<br>";
       			echo "<a href='donordelete.php'> Back to main page </a>";
   				 }
   			 else
    			{
        	echo "ERROR!";
        // close connection 
        //mysql_close();
    }
    }
?>

        
	</body>
</html>