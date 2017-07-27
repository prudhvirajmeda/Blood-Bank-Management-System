<?php 
    

 $conn = include("connect.php");

    session_start();
    $query = oci_parse($conn,"select * from blood");
    $queryRes = oci_execute($query);
        
    echo "<table border='1'>
    <tr>
    <th>BLOODGROUP</th>
    <th>TOTALQUANTITY</th>
    
    </tr>";

    while($row = oci_fetch_array($query,OCI_ASSOC+OCI_RETURN_NULLS))
    {
        echo "<tr>";
        echo "<td>" . $row['BLOODGROUP'] . "</td>";
        echo "<td>" . $row['TOTALQUANTITY'] . "</td>";
        echo "</tr>";
}
    echo "</table>";
    
    oci_close($conn);
?>
  
