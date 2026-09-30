<?php
include 'db.php';

$student_id = $_POST['id'];
$sql = "DELETE FROM student where id= '$student_id'"; // it means string number like '5', so it's ok
// $sql = "DELETE FROM student where id= {$student_id}"; //it means integer number like 5, so it's fine
// $sql = "DELETE FROM student where id= $student_id"; // it catches both numeric and text values, so it's also correct here
$result = mysqli_query($conn, $sql) or die("SQL delete query failed");

if ($result){
    echo 1;
} else {
    echo 0;
}
?>