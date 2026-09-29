<?php
include ('db.php');
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$sql = "INSERT INTO student(first_name, last_name) VALUES ('{first_name}','{last_name}')";
// $result = mysqli_query($conn, $sql) or die("Mysqli insert query failed");
if(mysqli_query($conn, $sql)){
    echo 1;
} else {
    echo 0;
}
?>