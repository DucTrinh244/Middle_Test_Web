<?php include './views/header.php'; ?>
<?php include './uploadfile.php'; ?>
<div class="container-xxl mt-2">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <h2 class="text-center text-primary">ADD STUDENT</h2>
        </div>

        <form action="add_product_action.php" method="post" enctype="multipart/form-data">
            <div class="col-xl-12 col-lg-12">
                <form action="">
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
                                <img id="imagePreview" src="#" alt="Image Preview"
                                    style="display:none; max-width: 300px;" />
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
                                            class="form-control" placeholder="Enter Title">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="student-title" class="form-label">Age</label>
                                        <input type="number" name="student_age" id="student-title"
                                            class="form-control" placeholder="Enter age" min=1>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="student-title" class="form-label">Class</label>
                                        <input type="text" name="student_class" id="student-title"
                                            class="form-control" placeholder="Enter Class">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="student-title" class="form-label">Address</label>
                                        <input type="text" name="student_address" id="student-title"
                                            class="form-control" placeholder="Enter Address">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-0">
                                        <label for="description" class="form-label">Status</label>
                                        <select class="form-control" data-choices name="student_status"
                                            id="choices-single-default">
                                            <option value="1"> Active</option>
                                            <option value="0"> Unactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 bg-light mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <input type="submit" class="btn btn-outline-secondary w-100" name="Them" value="Add student">
                            </div>
                            <div class="col-lg-2">
                                <input type="reset" class="btn btn-primary w-100" name="Hủy" value="Cancel">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </form>
    </div>
</div>
<?php include './views/footer.php'; ?>