<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "itmanager");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$category = mysqli_real_escape_string($link, $_REQUEST['category']);
$type = mysqli_real_escape_string($link, $_REQUEST['type']);
$serialno = mysqli_real_escape_string($link, $_REQUEST['serialno']);
$actcode = mysqli_real_escape_string($link, $_REQUEST['actcode']);
$trn_date = date("Y-m-d H:i:s");
 
// attempt insert query execution
$sql = "INSERT INTO software (category,type,serialno,actcode,trn_date ) VALUES ('$category', '$type', '$serialno','$actcode','$trn_date')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>