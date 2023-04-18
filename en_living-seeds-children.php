<?php
session_start();
if (isset($_SESSION['id'])) {
    $customer_id = $_SESSION['id'];
}
include('admin/include/dbController.php');
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
    <link rel="icon" href="assets/images/favicon/2.png" type="image/x-icon">
    <title>Living Seeds Children's Services | Wayshk </title>

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


<!-- Cart Section Start -->
<section class="contact-box-section">
    <div class="container-fluid-lg">
        <div class="row g-lg-5 g-3">
            <div class="col-lg-12 mb-5">
                <div class="left-sidebar-box">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact-title text-center mb-5">
                                <h2>
                                    Liveseed Children's Services - Occupational Therapy Services
                                </h2>
                                <h4 class="mt-3">
                                    The experienced occupational therapists of Seeds for Children can provide school-based occupational therapy services to needy school children. Through diversified therapeutic activities, we help students with different learning abilities to participate in campus and daily life. In addition, teachers/parents interactive workshops or lectures on different topics can also be organized for schools.
                                </h4>
                            </div>

                            <div class="contact-detail mt-5">
                                <div class="row g-4">
                                    <div class="col-md-4">
                                        <h2 class="mb-3">Services include:</h2>
                                        <ul>
                                            <li>Preschool/Primary/Secondary school services (assessment and training</li>
                                            <li> Teacher/Parent Workshop</li>
                                            <li>Online parent-child courses</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <div class="contact-detail-box" style="background: #e2caca">
                                                            <div class="contact-icon"><i
                                                                    class="fa-solid fa-arrow-right"></i>
                                                            </div>
                                                            <div class="contact-detail-title">
                                                                <h4>Sensory integration</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="contact-detail-box" style="background: #e2caca">
                                                            <div class="contact-icon"><i
                                                                    class="fa-solid fa-arrow-right"></i>
                                                            </div>
                                                            <div class="contact-detail-title">
                                                                <h4>Hand function</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="contact-detail-box" style="background: #e2caca">
                                                            <div class="contact-icon"><i
                                                                    class="fa-solid fa-arrow-right"></i>
                                                            </div>
                                                            <div class="contact-detail-title">
                                                                <h4>Visual perception</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <div class="contact-detail-box" style="background: #e2caca">
                                                            <div class="contact-icon"><i
                                                                    class="fa-solid fa-arrow-right"></i>
                                                            </div>
                                                            <div class="contact-detail-title">
                                                                <h4>Early Childhood Development</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="contact-detail-box" style="background: #e2caca">
                                                            <div class="contact-icon"><i
                                                                    class="fa-solid fa-arrow-right"></i>
                                                            </div>
                                                            <div class="contact-detail-title">
                                                                <h4>Pre-Writing/Writing Skills</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="contact-detail-box" style="background: #e2caca">
                                                            <div class="contact-icon"><i
                                                                    class="fa-solid fa-arrow-right"></i>
                                                            </div>
                                                            <div class="contact-detail-title">
                                                                <h4>Focus/executive function</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5 mt-5">
                                <h2 class="mb-3">1. Sensory integration training</h2>
                                <p>
                                    Through various dynamic activities, improve the overall sensory adjustment ability. Reduce hyperesthesia/weakness; adjust wakefulness, assist students with abnormally high or low activity levels to maintain a good state of wakefulness, improve concentration; improve posture control, balance, movement planning, and large muscle coordination, etc.
                                    To assist students in meeting their daily life and learning needs.</p>
                            </div>
                            <div class="row mb-5">
                                <h2 class="mb-3">2. Sensory processing and eye control training</h2>
                                <p>Activities based on the "Astronaut Training-A Sound Activated Vestibular-Visual Protocol" (Astronaut Training-A Sound Activated Vestibular-Visual Protocol) fundamentally improve sensory regulation.
                                    Cooperate with other specially designed teaching materials to improve students' eye control/hand-eye coordination/visual concentration ability. Target students: have obvious reading and writing difficulties, skip lines and words when reading/copying, easily miss questions, often have copying errors, weak visual concentration, etc.</p>
                            </div>
                            <div class="row mb-5">
                                <h2 class="mb-3">3. Small muscle and writing ability training</h2>
                                <p>Identify students' writing difficulties through various assessments, and provide follow-up or test adjustment suggestions. Warm up with multi-sensory activities to improve sitting posture/concentration/upper body stability and other prerequisite elements for writing. Improve finger strength/finger flexibility, improve writing posture and spatial relationship,
                                    Thereby improving the speed/endurance of writing and the aesthetics of fonts</p>
                            </div>
                            <div class="row mb-5">
                                <h2 class="mb-3">4. Concentration and executive function training </h2>
                                <p>Carry out various dynamic and static concentration training activities in groups. Learn teamwork in interactive games, and at the same time strengthen students' ability to perform tasks, improve working memory, emotional control, flexibility, time management, organizational skills, etc. In addition, we will also discuss with students and design individualized plans for weekdays,
                                    Improve behavior in different situations.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Cart Section End -->

<!-- Breadcrumb Section Start -->
<!--<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>Contact Us</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!-- Breadcrumb Section End -->

<!-- Contact Box Section Start -->
<!--<section class="contact-box-section">
    <div class="container-fluid-lg">
        <div class="row g-lg-5 g-3">
            <div class="col-lg-6">
                <div class="left-sidebar-box">
                    <div class="row">

                        <div class="col-xl-12">
                            <div class="contact-title">
                                <h3>Get In Touch</h3>
                            </div>

                            <div class="contact-detail">
                                <div class="row g-4">
                                    <div class="col-xxl-6 col-lg-12 col-sm-6">
                                        <div class="contact-detail-box">
                                            <div class="contact-icon">
                                                <i class="fa-solid fa-phone"></i>
                                            </div>
                                            <div class="contact-detail-title">
                                                <h4>Phone</h4>
                                            </div>

                                            <div class="contact-detail-contain">
                                                <p>+852 52657359</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-6 col-lg-12 col-sm-6">
                                        <div class="contact-detail-box">
                                            <div class="contact-icon">
                                                <i class="fa-solid fa-envelope"></i>
                                            </div>
                                            <div class="contact-detail-title">
                                                <h4>Email</h4>
                                            </div>

                                            <div class="contact-detail-contain">
                                                <p>ways00.hk@gmail.com</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-6 col-lg-12 col-sm-6">
                                        <div class="contact-detail-box">
                                            <div class="contact-icon">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </div>
                                            <div class="contact-detail-title">
                                                <h4>Address</h4>
                                            </div>

                                            <div class="contact-detail-contain">
                                                <p>香港大圍成運路21-23號群力工業大廈3樓1室</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="title d-xxl-none d-block">
                    <h2>Contact Us</h2>
                </div>
                <div class="right-sidebar-box">
                    <div class="row">
                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                            <div class="mb-md-4 mb-3 custom-form">
                                <label for="exampleFormControlInput" class="form-label">First Name</label>
                                <div class="custom-input">
                                    <input type="text" class="form-control" id="exampleFormControlInput"
                                           placeholder="Enter First Name">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                            <div class="mb-md-4 mb-3 custom-form">
                                <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                                <div class="custom-input">
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                           placeholder="Enter Last Name">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                            <div class="mb-md-4 mb-3 custom-form">
                                <label for="exampleFormControlInput2" class="form-label">Email Address</label>
                                <div class="custom-input">
                                    <input type="email" class="form-control" id="exampleFormControlInput2"
                                           placeholder="Enter Email Address">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                            <div class="mb-md-4 mb-3 custom-form">
                                <label for="exampleFormControlInput3" class="form-label">Phone Number</label>
                                <div class="custom-input">
                                    <input type="tel" class="form-control" id="exampleFormControlInput3"
                                           placeholder="Enter Your Phone Number" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value =
                                        this.value.slice(0, this.maxLength);">
                                    <i class="fa-solid fa-mobile-screen-button"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-md-4 mb-3 custom-form">
                                <label for="exampleFormControlTextarea" class="form-label">Message</label>
                                <div class="custom-textarea">
                                    <textarea class="form-control" id="exampleFormControlTextarea"
                                              placeholder="Enter Your Message" rows="6"></textarea>
                                    <i class="fa-solid fa-message"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-animation btn-md fw-bold ms-auto">Send Message</button>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!-- Contact Box Section End -->

<!-- Map Section Start -->
<!--<section class="map-section">
    <div class="container-fluid p-0">
        <div class="map-box">
            <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1125.317043789715!2d114.18058410077128!3d22.376025312012693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x340407a864400001%3A0x15f7365383c741b2!2z5qiT5LiKIC0g5aSn5ZyN5bqX!5e1!3m2!1sen!2sbd!4v1676801498144!5m2!1sen!2sbd"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
       </div>
    </div>
</section>-->
<!-- Map Section End -->


<!-- Footer Section Start -->
<?php
include('include/footer.php');
?>
<!-- Footer Section End -->

<!-- Deal Box Modal Start -->
<div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title w-100" id="deal_today">Deal Today</h5>
                    <p class="mt-1 text-content">Recommended deals for you.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="deal-offer-box">
                    <ul class="deal-offer-list">
                        <?php
                        $product = $db_handle->runQuery("select * from product WHERE status= '1' order by rand() limit 5");
                        $row = $db_handle->numRows("select * from product WHERE status= '1' order by rand() limit 5");
                        for ($i = 0; $i < $row; $i++) {
                            $image = explode(',',$product[$i]['p_image'])
                            ?>
                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop.php" class="deal-image">
                                        <img src="admin/<?php echo $image[0];?>" class="blur-up lazyload"
                                             alt="">
                                    </a>

                                    <a href="shop.php" class="deal-contain">
                                        <h5><?php echo $product[$i]['p_name']?></h5>
                                        <h6><?php echo $product[$i]['product_price']?></h6>
                                    </a>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Deal Box Modal End -->

<!-- Tap to top start -->
<div class="theme-option">

    <div class="back-to-top">
        <a id="back-to-top" href="#">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
</div>
<!-- Tap to top end -->


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
<script src="assets/js/slick/custom_slick.js"></script>

<!-- script js -->
<script src="assets/js/script.js"></script>

<!-- thme setting js -->
<script src="assets/js/theme-setting.js"></script>
</body>
</html>
