<?php
include 'db.php';
$search_value = mysqli_escape_string($conn, $_POST['search']);
// $search_value = $_POST['search']; // hoileo hoi
// $limit = 3;

// if(isset($_POST['page_no'])){
//     $page = $_POST['page_no'];
// } else {
//     $page = 1;
// }

// $offset = ($page - 1) * $limit;

$sql = "SELECT * FROM student WHERE first_name LIKE '%{$search_value}%' OR last_name LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($result) > 0) {
    $output = "<table border='1' width='100%' cellspacing='0' cellpadding='10px'>
    <tr>
    <th width='60px'> ID </th>
    <th> Name </th>
    <th width='90px'> Edit </th>
    <th width='90px'> Delete </th>
    </tr>";


    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr><td>{$row['id']}</td><td>{$row['first_name']} {$row['last_name']}</td><td style='text-align:center'><button class='edit-btn' data-eid='{$row['id']}'> Edit </button></td><td><button class='delete-btn' data-id='{$row['id']}'> Delete </button></td></tr>";
    } //<td align='center'> likleo hoi
    $output .= "</table>";
    mysqli_close($conn);
    echo $output;
} else {
    echo "<h2>No record found.</h2>";
}
?>