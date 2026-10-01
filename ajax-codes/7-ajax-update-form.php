<?php
include 'db.php';

$student_id = $_POST['id'];
$firstName = $_POST['first'];
$lastName = $_POST['id'];
$sql = "DELETE FROM student where id= '$student_id'"; 
$result = mysqli_query($conn, $sql) or die("SQL delete query failed");

if ($result){
    echo 1;
} else {
    echo 0;
}
?>