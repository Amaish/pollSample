<?php 
//Connection Credentials
$server     = "localhost";
$username   = "root";
$password   = "";

$database   = "receivingViaCallback";

$conn = mysqli_connect($server, $username, $password, $database);

if($conn->error){
    echo $conn->error;
}
else{
    echo "successfully connected to DB<br>";
}

?>

