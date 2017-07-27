<?php 
    

 $conn = include("connect.php");

    session_start();
    $query = oci_parse($conn,"select * from shipping");
    $queryRes = oci_execute($query);
        
    echo "<table border='1'>
    <tr>
    <th>ORDERNUM</th>
    <th>S_ID</th>
    </tr>";

    while($row = oci_fetch_array($query,OCI_ASSOC+OCI_RETURN_NULLS))
    {
        echo "<tr>";
        echo "<td>" . $row['ORDERNUM'] . "</td>";
        echo "<td>" . $row['S_ID'] . "</td>";
        
        echo "</tr>";
}
    echo "</table>";
    
    oci_close($conn);
?>
  
