<?php
$conn = mysqli_connect("localhost", "root", "", "test") or die("connection failed");
$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "
        

        <tr><td>{$row['id']}</td><td>{$row['first_name']} {$row['last_name']}</td><td style='text-align:center'><button class='edit-btn' data-eid='{$row['id']}'> Edit </button></td><td><button class='delete-btn' data-id='{$row['id']}'> Delete </button></td> </tr>";
    }
    mysqli_close($conn);
    echo $output;
} else {
    echo "<h2>No record found.</h2>";
}
?>