<?php include './views/header.php'; ?>
<?php include './uploadfile.php'; ?>
<?php
include("../connnect.php");
$sl = "SELECT * FROM students WHERE student_id=" . $_GET['student_id'];
$results = mysqli_query($connect, $sl);
$d = mysqli_fetch_array($results);
?>
<div class="container-xxl mt-2">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <h2 class="text-center text-primary">UPDATE STUDENT</h2>
        </div>

        <form action="  " method="post" enctype="multipart/form-data">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Chosen a picture</h4>
                    </div>
                    <div class="card-body">
                        <!-- File Upload -->

                        <div class="fallback">
                            <label for="myFileInput" class="form-label">Choose Picture</label>
                            <input name="student_image" class="form-control btn btn-primary" type="file"
                                accept="image/*" id="myFileInput" onchange="previewImage(event)" />
                        </div>
                        <div class="mt-3">
                            <img id="imagePreview" src="../assets/image/<?php echo $d['student_image']; ?>" width="100" height="100" />
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">General Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="student-title" class="form-label">Name Student</label>
                                    <input type="text" name="student_name" id="student-title"
                                        class="form-control" placeholder="Enter Title" value="<?php echo $d['student_name']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="student-title" class="form-label">Age</label>
                                    <input type="number" name="student_age" id="student-title"
                                        class="form-control" placeholder="Enter age" min=1 value="<?php echo $d['student_age']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="student-title" class="form-label">Class</label>
                                    <input type="text" name="student_class" id="student-title"
                                        class="form-control" placeholder="Enter Class" value="<?php echo $d['student_class']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="student-title" class="form-label">Address</label>
                                    <input type="text" name="student_address" id="student-title"
                                        class="form-control" placeholder="Enter Address" value="<?php echo $d['student_address']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-0">
                                    <label for="description" class="form-label">Status</label>
                                    <select class="form-control" data-choices name="student_status"
                                        id="choices-single-default">
                                        <option value="1" <?php if ($d['student_status'] == 1) echo "selected"; ?>> Active</option>
                                        <option value="0" <?php if ($d['student_status'] == 0) echo "selected"; ?>> Unactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-3 bg-light mb-3 rounded">
                    <div class="row justify-content-end g-2">
                        <div class="col-lg-2">
                            <input type="submit" name="update" class="btn btn-outline-secondary w-100" value="Update student">
                        </div>
                        <div class="col-lg-2">
                            <input type="reset" name="reset" class="btn btn-primary w-100" value="Cancel">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include './views/footer.php'; ?>
<?php
if (isset($_POST['update'])) {
    $student_name = $_POST['student_name'];
    $student_age = $_POST['student_age'];
    $student_class = $_POST['student_class'];
    $student_address = $_POST['student_address'];
    $student_status = $_POST['student_status'];

    if (empty($_FILES['student_image']['name'])) {
        $sql = "UPDATE students SET student_name='$student_name',
                                    student_age='$student_age',
                                    student_class='$student_class',
                                    student_address='$student_address',
                                    student_status='$student_status'
                                WHERE student_id=" . $_GET['student_id'];
    } else {
        $student_image = $_FILES['student_image']['name'];
        $anhminhhoa_tmp = $_FILES['student_image']['tmp_name'];
        move_uploaded_file($anhminhhoa_tmp, "../assets/image/" . $student_image);

        $sql = "UPDATE students SET student_name='$student_name',
                                    student_age='$student_age',
                                    student_class='$student_class',
                                    student_address='$student_address',
                                    student_status='$student_status',
                                    student_image='$student_image'
                                WHERE student_id=" . $_GET['student_id'];
    }

    if (mysqli_query($connect, $sql)) {
        echo "<script>alert('Sửa thành công'); location.href='list_product.php';</script>";
    } else {
        echo 'Lỗi: ', mysqli_error($connect);
    }
}
?>