<?php 
    
//$DB = 'usr';
//$DB_USER = 'mudhaffarno';
//$DB_PASS = 'V00634608';
//$DB_CHAR = 'Noha';
//$conn = oci_connect($DB_USER, $DB_PASS, $DB, $DB_CHAR);
// $conn = oci_connect('albalawiw', 'V00770335', 'localhost:20037/xe');
 $conn = include("connect.php");

    session_start();
    $query = oci_parse($conn,"select * from bloodrequest");
    $queryRes = oci_execute($query);
        
    echo "<table border='1'>
    <tr>
    <th>ORDERNUM</th>
    <th>HOSPITAL_NAME</th>
    <th>PATIENT_NAME</th>
    <th>BLOODGROUP</th>
    <th>QUANTITY</th>
    <th>REQUEST DATE</th>
    </tr>";

    while($row = oci_fetch_array($query,OCI_ASSOC+OCI_RETURN_NULLS))
    {
        echo "<tr>";
        echo "<td>" . $row['ORDERNUM'] . "</td>";
        echo "<td>" . $row['H_NAME'] . "</td>";
        echo "<td>" . $row['P_NAME'] . "</td>";
        
        echo "<td>" . $row['BLOODGROUP'] . "</td>";
        echo "<td>" . $row['QUANTITY'] . "</td>";
        echo "<td>" . $row['ENTERDATE'] . "</td>";
        echo "</tr>";
}
    echo "</table>";
    
    oci_close($conn);
?>
  
