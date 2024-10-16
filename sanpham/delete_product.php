<?php
include('../connnect.php');
$idTL = $_GET['student_id'];
$sql = "DELETE FROM students WHERE student_id=" . $idTL;

if (mysqli_query($connect, $sql)) {
    echo "<script>alert('Xóa thành công'); 
    location.href='list_product.php';</script>";
} else {
    echo 'Lỗi: ', mysqli_error($connect);
}
