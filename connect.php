<?php
// Create connection to Oracle
$conn = oci_connect('medapr', 'V00763199', 'localhost:20037/xe'); if (!$conn) {
$m = oci_error();
echo $m['message'], "\n"; exit;
}
else {
// print "Connected to Oracle!"; 
}
return $conn;
oci_close($conn);
// Close the Oracle connection oci_close($conn);
?>