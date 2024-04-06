<?php
if(isset($_POST['id'])) {

    $student_id = $_POST['id'];


    if(is_array($student_id)) {
    
        $str = implode(",", $student_id);

    
        $conn = mysqli_connect("localhost", "root", "", "test") or die("Connection Failed");

        $sql = "DELETE FROM student WHERE id IN ({$str})";
        if(mysqli_query($conn, $sql)) {
            echo 1; 
        } else {
            echo 0; 
        }
    } else {
        echo 0; 
    }
} else {
    echo 0; 
}
?>
