<?php
include_once($_SERVER["DOCUMENT_ROOT"] . '/MainaTest/pollSample/dbConnector.php');
 $from = $_POST['from'];
 $to = $_POST['to'];
 $text = $_POST['text'];
 $date = $_POST['date'];
 //$id = $_POST['id'];
 $linkId = $_POST['linkId'];

 $query = "INSERT INTO `Details`(`_from`,`_to`,`text`,`date`,`linkId`)
 VALUES('$from','$to','$text','$date','$linkId')";

// run query
$saveDetails = mysqli_query($conn, $query);