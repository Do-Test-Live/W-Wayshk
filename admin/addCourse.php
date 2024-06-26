<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
if (!isset($_SESSION['userid'])) {
    header("Location: Login");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Add Course | Wayshk Admin</title>
    <?php include 'include/css.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.21.0/ckeditor.js" integrity="sha512-ff67djVavIxfsnP13CZtuHqf7VyX62ZAObYle+JlObWZvS4/VQkNVaFBOO6eyx2cum8WtiZ0pqyxLCQKC7bjcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <?php include 'include/header.php'; ?>

    <?php include 'include/nav.php'; ?>

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <!-- Add Course -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Course</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="Insert" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Course Name</label>
                                            <input type="text" class="form-control" placeholder="" name="course_name" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Course Name (EN)</label>
                                            <input type="text" class="form-control" placeholder="" name="course_name_en" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Course Type</label>
                                            <input type="text" class="form-control" placeholder="" name="course_type" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Course Duration</label>
                                            <input type="text" class="form-control" placeholder="" name="course_duration" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Course Price</label>
                                            <input type="number" class="form-control" placeholder="" name="course_price" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Course Price for Poor Family</label>
                                            <input type="number" class="form-control" placeholder="" name="course_price_poor">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Enrollment Google Form Link</label>
                                            <input type="text" class="form-control" placeholder="" name="form_link">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Course Image</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="course_image" accept="image/png, image/jpeg, image/jpg" required="">
                                                    <label class="custom-file-label">Choose file (png, jpg, jpeg)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Course Description *</label>
                                            <textarea class="form-control" rows="4" id="comment" name="course_description" required></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Course Description * (EN)</label>
                                            <textarea class="form-control" rows="4" id="comment" name="course_description_en" required></textarea>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary w-50" name="add_course">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

    <?php include 'include/footer.php'; ?>

</div>
<!--**********************************
    Main wrapper end
***********************************-->

<?php include 'include/js.php'; ?>
<script>
    CKEDITOR.replace('course_description');
    CKEDITOR.replace('course_description_en');
</script>
</body>
</html>
