<?php
include 'db.php';

$student_id = $_POST['id'];
$firstName = $_POST['first_name']; //first_name index er .edit-submit class er selection e first_name, last_name key hisebe neya hoisilo, oitai catch kora hoise variable e
$lastName = $_POST['last_name'];
$sql = "UPDATE student SET first_name= '{$firstName}', last_name = '{$lastName}' WHERE id= {$student_id}"; 
$result = mysqli_query($conn, $sql) or die("SQL update query failed");

if ($result){
    echo 1;
} else {
    echo 0;
}
?>