
<?php

 $conn = include("connect.php");
 // $query = oci_parse($conn,"SELECT BLOOD_TEST.S_ID,STAFF.FIRSTNAME||' 'STAFF.LASTNAME as staff_name ,Donor.D_ID,Donor.FIRSTNAME||' '||Donor.LASTNAME as Donor_name, BLOOD_TEST.BLOODGROUP,BLOOD_TEST.TESTRESULT,BLOOD_TEST.QUANTITY FROM (Donor,BLOOD_TEST,STAFF) where Donor.D_ID = BLOOD_TEST.D_ID AND BLOOD_TEST.S_ID=STAFF.S_ID");
// $query =  oci_parse($conn,'SELECT * from donor');
$query = oci_parse($conn,"SELECT Donor.D_ID,donor.FIRSTNAME , donor.lastname ,
blood_test.T_ID , blood_test.BLOODGROUP , blood_test.TESTRESULT ,blood_test.QUANTITY,
staff.S_ID, staff.FIRSTNAME  ,staff.lastname  
from donor,blood_test,staff where Donor.D_ID = BLOOD_TEST.D_ID AND BLOOD_TEST.S_ID=STAFF.S_ID");


oci_execute($query);
 echo "<table border='1'>
    <tr>
    <th>D_ID</th>
    <th>DONOR NAME</th>
    <th>T_ID</th>
    <th>BLOODGROUP</th>
    <th>TESTRESULT</th>
    <th>QUANTITY</th>
    <th>S_ID</th>
    <th>STAFF NAME</th>
    

    
    </tr>";

    // while($row = oci_fetch_array($query,OCI_ASSOC+OCI_RETURN_NULLS))
         while($row = oci_fetch_array($query,OCI_BOTH+OCI_RETURN_NULLS))
    {
        echo "<tr>";
        
        echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . " " . $row[2] ."</td>";
        echo "<td>" . $row[3] . "</td>";
        echo "<td>" . $row[4] . "</td>";
        echo "<td>" . $row[5] . "</td>";
        echo "<td>" . $row[6] . "</td>";
        echo "<td>" . $row[7] . "</td>";
        echo "<td>" . $row[8] . " " . $row[9] ."</td>";

        // echo "<td>" . $row['DONOR NAME'] ."</td>" ;
       	// echo "<td>" . $row['T_ID'] . "</td>";
       	// echo "<td>" . $row['BLOODGROUP'] . "</td>";
        // echo "<td>" . $row['TESTRESULT'] . "</td>";
        // echo "<td>" . $row['QUANTITY'] . "</td>";
        // echo "<td>" . $row['S_ID'] . "</td>";
        // echo "<td>" . $row['STAFF NAME'] . "</td>";
       	
        echo "</tr>";
}
    echo "</table>";




   



?>
