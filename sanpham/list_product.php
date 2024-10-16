<?php include './views/header.php'; ?>
<div class="container-xxl">

    <div class="row">
        <div class="col-xl-12">
            <div class="card mt-5">
                <div class="card-header d-flex justify-content-between align-items-center gap-1">
                    <h4 class="card-title flex-grow-1">All Students </h4>

                    <a href="add_product.php" class="btn btn-sm btn-primary">
                        Add Student
                    </a>
                </div>
                <div>
                    <div class="table-responsive">
                        <?php include_once('../connnect.php'); ?>
                        <table class="table align-middle mb-0 table-hover table-centered">
                            <thead class="bg-light-subtle">
                                <tr>
                                    <th>Students</th>
                                    <th>Age</th>
                                    <th>Class</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $sql = "SELECT * FROM students";
                            $results = mysqli_query($connect, $sql);
                            while (($rows = mysqli_fetch_assoc($results)) != NULL) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div
                                                    class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                    <img src="../assets/image/<?php echo $rows['student_image']; ?>"
                                                        alt="picture_student" class="avatar-md">
                                                </div>
                                                <p class="text-dark fw-medium fs-15 mb-0">
                                                    <?php echo $rows['student_name']; ?>
                                                </p>
                                            </div>

                                        </td>
                                        <td>
                                            <?php echo $rows['student_age']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rows['student_class']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rows['student_address']; ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($rows['student_status'] == 0) {
                                            ?>
                                                <a href="active_status.php?student_id=<?php echo $rows['student_id']; ?>" class="btn btn-light btn-sm">
                                                    <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                                </a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="unactive_status.php?student_id=<?php echo $rows['student_id']; ?>" class="btn btn-primary btn-sm">
                                                    <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                                </a>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <!-- EDIT CATEGORY -->
                                                <a href="edit_product.php?student_id=<?php echo $rows['student_id']; ?>"
                                                    class="btn btn-soft-primary btn-sm">
                                                    <iconify-icon icon="solar:pen-2-broken"
                                                        class="align-middle fs-18"></iconify-icon>
                                                </a>
                                                <!-- DELETE CATEGORY -->
                                                <a href="delete_product.php?student_id=<?php echo $rows['student_id']; ?>"
                                                    onclick="return confirm('Bạn có chắc là muốn xóa không?')"
                                                    class="btn btn-soft-danger btn-sm">
                                                    <iconify-icon
                                                        icon="solar:trash-bin-minimalistic-2-broken"
                                                        class="align-middle fs-18"></iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php }
                            mysqli_close($connect);
                            ?>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
                <div class="card-footer border-top">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end mb-0">
                            <span></span>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include './views/footer.php'; ?>