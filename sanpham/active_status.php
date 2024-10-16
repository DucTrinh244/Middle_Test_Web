<?php
include("../connnect.php");

if (isset($_GET['student_id']) && is_numeric($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    $sql = "UPDATE students SET student_status = 1 WHERE student_id = $student_id";

    if (mysqli_query($connect, $sql)) {
        echo "<script>alert('Student activated successfully'); location.href='list_product.php';</script>";
    } else {
        echo "Error updating status: " . mysqli_error($connect);
    }
} else {
    echo "Invalid student ID.";
}
