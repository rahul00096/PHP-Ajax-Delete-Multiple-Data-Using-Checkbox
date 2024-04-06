<?php
$conn = mysqli_connect("localhost", "root", "", "test") or die("connection failed");
$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql) or die("query unsuccessful");

$output = "";

if (mysqli_num_rows($result) > 0) {
    $output .= "<table border='0' width='100%' cellpadding='10px' cellspacing='2'>
    <tr>
    <th width='30px'></th>
    <th width='60'>Id</th>
    <th>Name</th>
    <th width='90px'>Age</th>
    <th width='90px'>City</th>
    </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "
        <tr>
        <td align='center'><input type='checkbox' value='{$row['id']}'></td>
        <td align='center'>{$row['id']}</td>
        <td align='center'>{$row['student_name']}</td>
        <td align='center'>{$row['age']}</td>
        <td align='center'>{$row['city']}</td>
        </tr>";
    }
    $output .= "</table>";
    echo $output;
} else {
    echo "<h2>No records found</h2>";
}
?>
