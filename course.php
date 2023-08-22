<?php
session_start();
if(isset($_SESSION['id'])){
    $customer_id = $_SESSION['id'];
}
include ('admin/include/dbController.php');
$db_handle = new DBController();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Wayshk">
    <meta name="keywords" content="Wayshk">
    <meta name="author" content="Wayshk">

    <title>Courses - WaysHK</title>

    <?php include('include/css.php'); ?>
    <style>
        header .header-top .about-list .right-nav-list .theme-form-select .dropdown-toggle.hkd::before {
            content: " ";
            position: absolute;
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            right: 0;
            color: #fff;
        }
    </style>
</head>

<body>

<!-- Loader Start -->
<div class="fullpage-loader">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>
<!-- Loader End -->

<!-- Header Start -->
<?php
include('include/header.php');
?>
<!-- Header End -->


<!-- Breadcrumb Section Start -->
<!--<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12 text-center pt-5 pb-5">
                <h2>Occupational Therapy Services</h2>
            </div>
        </div>
    </div>
</section>-->
<!-- Breadcrumb Section End -->

<!-- Blog Section Start -->
<section class="blog-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row g-4">
            <div class="col-12 text-center">
                <h2 class="inner-header"><?php
                    if($_SESSION['language'] === 'CN')
                        echo '精選課程';
                    else
                        echo 'Featured Courses'
                    ?></h2>
            </div>
            <div class="col-12 text-center">
                <div class="row text-center">
                    <div class="col-4">
                        <input type="search" id="search-box" class="form-control" placeholder="I am searching for" aria-label="Recipient's username" aria-describedby="button-addon2">
                    </div>
                </div>
            </div>
            <div class="col-xxl-12 mt-5">
                <div class="row g-4 ratio_65">
                <?php
                $fetch_course = $db_handle->runQuery("select * from course where status = '1' order by order_no");
                $no_fetch_course = $db_handle->numRows("select * from course where status = '1' order by order_no");
                for ($i=0; $i < $no_fetch_course; $i++){
                    ?>
                    <div class="col-xxl-4 col-sm-6 m-auto mt-3 blog-box wow fadeInUp">
                        <div class="blog-box wow fadeInUp">
                            <div class="blog-image">
                                <a href="Course-Details?id=<?php echo $fetch_course[$i]['course_id'];?>">
                                    <img src="admin/<?php echo $fetch_course[$i]['course_image'];?>"
                                         class="bg-img blur-up lazyload" alt="">
                                </a>
                            </div>

                            <div class="blog-contain">
                                <a href="Course-Details?id=<?php echo $fetch_course[$i]['course_id'];?>">
                                    <h3><?php
                                        if($_SESSION['language'] === 'CN')
                                            echo $fetch_course[$i]['course_name'];
                                        else
                                            echo $fetch_course[$i]['course_name_en'];
                                        ?>
                                    </h3>
                                        <h4>
                                            <?php
                                            if($_SESSION['language'] == 'CN')
                                                echo '課程類型:';
                                            else
                                                echo 'Course Type:';
                                            ?>
                                            <?php
                                            echo $fetch_course[$i]['course_type'];
                                            ?></h4>
                                </a>
                                <hr/>
                                <div class="blog-label">
                                    <p>
                                        <?php
                                        if($_SESSION['language'] == 'CN')
                                            echo '價格';
                                        else
                                            echo 'Over';
                                        ?>
                                    </p>
                                    <span class="time"><span><?php echo $fetch_course[$i]['course_price'];?> HKD</span></span>
                                    <span class="super"><span><?php
                                            if($fetch_course[$i]['course_price_poor'] > 0){
                                                if($_SESSION['language'] == 'CN'){
                                                    echo '低收入家庭';
                                                }else {
                                                    echo 'Low-income families';
                                                }
                                                ?>
                                                <?php echo $fetch_course[$i]['course_price_poor'];?> HKD
                                                <?php
                                            }
                                            ?></span></span>
                                </div>
                                <button onclick="window.location.href='Course-Details?id=<?php echo $fetch_course[$i]['course_id'];?>'" class="blog-button"><?php
                                    if($_SESSION['language'] === 'CN')
                                        echo '查看課程';
                                    else
                                        echo 'View courses';
                                    ?><i class="fa-solid fa-right-long"></i></button>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Footer Section Start -->
<?php
include('include/footer.php');
?>
<!-- Footer Section End -->


<!-- Deal Box Modal Start -->
<?php include ('include/deal.php');?>
<!-- Deal Box Modal End -->

<!-- Bg overlay Start -->
<div class="bg-overlay"></div>
<!-- Bg overlay End -->

<!-- latest jquery-->
<script src="assets/js/jquery-3.6.0.min.js"></script>

<!-- jquery ui-->
<script src="assets/js/jquery-ui.min.js"></script>

<!-- Bootstrap js-->
<script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>
<script src="assets/js/bootstrap/popper.min.js"></script>

<!-- feather icon js-->
<script src="assets/js/feather/feather.min.js"></script>
<script src="assets/js/feather/feather-icon.js"></script>

<!-- Lazyload Js -->
<script src="assets/js/lazysizes.min.js"></script>

<!-- Slick js-->
<script src="assets/js/slick/slick.js"></script>
<script src="assets/js/slick/slick-animation.min.js"></script>
<script src="assets/js/slick/custom_slick.js"></script>

<!-- WOW js -->
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/custom-wow.js"></script>

<!-- script js -->
<script src="assets/js/script.js"></script>

<!-- thme setting js -->
<script src="assets/js/theme-setting.js"></script>

<script>
    const searchBox = document.getElementById('search-box');
    const blogBoxes = document.querySelectorAll('.blog-box');

    searchBox.addEventListener('input', function() {
        const searchTerm = searchBox.value.toLowerCase();

        blogBoxes.forEach(blogBox => {
            const titleElement = blogBox.querySelector('h3');
            const titleText = titleElement.textContent.toLowerCase();

            if (titleText.includes(searchTerm)) {
                blogBox.style.display = 'block';
            } else {
                blogBox.style.display = 'none';
            }
        });
    });
</script>
</body>
</html>
