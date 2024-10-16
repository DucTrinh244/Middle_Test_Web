<?php
include_once('../connnect.php');

if (isset($_POST['Them'])) {
    $student_image = $_FILES['student_image']['name'];
    $anhminhhoa_tmp = $_FILES['student_image']['tmp_name'];
    move_uploaded_file($anhminhhoa_tmp, "../assets/image/" . $student_image);

    $student_name = $_POST['student_name'];
    $student_age = $_POST['student_age'];
    $student_class = $_POST['student_class'];
    $student_address = $_POST['student_address'];
    $student_status = $_POST['student_status'];

    $sql = "INSERT INTO students (student_name, student_age, student_class, student_address, student_image, student_status)
     VALUES ('$student_name',
             '$student_age', 
             '$student_class', 
             '$student_address', 
             '$student_image', 
             '$student_status')";

    if (mysqli_query($connect, $sql)) {
        echo "<script>
        alert('Thêm thành công'); 
        location.href='list_product.php';
        </script>";
    } else {
        echo 'Lỗi: ', mysqli_error($connect);
    }
}
