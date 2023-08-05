<footer class="section-t-space mt-3">
    <div class="container-fluid-lg">
        <div class="main-footer section-b-space section-t-space">
            <div class="row g-md-4 g-3">
                <div class="col-xl-6 col-lg-6 col-sm-12">
                    <div class="footer-logo">
                        <div class="theme-logo">
                            <a href="Home">
                                <img src="assets/images/logo/2.png" class="blur-up lazyload" alt="">
                            </a>
                        </div>
                        <?php
                        if($_SESSION['language'] === 'CN'){
                            ?>
                            <div class="footer-logo-contain">
                                <a href="javascript:void(0)">香港大圍成運路21-23號群力工業大廈3樓1室</a></br></br>
                            </div>
                            <?php
                        }else{
                            ?>
                            <div class="footer-logo-contain">
                                <a href="javascript:void(0)">Room 1, 3rd Floor, Qunli Industrial Building, 21-23 Shing Wan Road, Tai Wai, Hong Kong</a></br></br>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                    <div class="footer-title">
                        <h4><?php if($_SESSION['language'] === 'CN') echo '產品訂購'; else echo 'Product Order';?></h4>
                    </div>

                    <div class="footer-contact">
                        <ul>
                            <li>
                                <div class="footer-number">
                                    <i data-feather="phone"></i>
                                    <div class="contact-number">
                                        <h6 class="text-content"><?php if($_SESSION['language'] === 'CN') echo 'Whatsapp'; else echo 'Whatsapp';?></h6>
                                        <a href="http://wa.me/85252657359" target="_blank">+852 52657359</a>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="footer-number">
                                    <i data-feather="mail"></i>
                                    <div class="contact-number">
                                        <h6 class="text-content"><?php if($_SESSION['language'] === 'CN') echo '電郵地址'; else echo 'Email Address :';?></h6>
                                        <a href="mailto:ways00.hk@gmail.com">ways00.hk@gmail.com</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-title mt-4">
                        <h4><?php if($_SESSION['language'] === 'CN') echo '查詢'; else echo 'Product Inquiry';?></h4>
                    </div>
                    <div class="footer-contact">
                        <ul>
                            <li>
                                <div class="footer-number">
                                    <i data-feather="phone"></i>
                                    <div class="contact-number">
                                        <h6 class="text-content"><?php if($_SESSION['language'] === 'CN') echo 'Whatsapp'; else echo 'Whatsapp';?></h6>
                                        <a href="http://wa.me/85256058389" target="_blank">+852 56058389</a>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="footer-number">
                                    <i data-feather="mail"></i>
                                    <div class="contact-number">
                                        <h6 class="text-content"><?php if($_SESSION['language'] === 'CN') echo '電郵地址'; else echo 'Email Address :';?></h6>
                                        <a href="mailto:ways00.hk@gmail.com">wayshk.order@gmail.com</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-sm-6  mt-3">
                    <div class="footer-title">
                        <h4><?php if($_SESSION['language'] === 'CN') echo '快速鏈接'; else echo 'Quick Link';?></h4>
                    </div>

                    <div class="footer-contain">
                        <?php
                        if($_SESSION['language'] === 'CN'){
                            ?>
                            <ul>
                                <li>
                                    <a href="Home" class="text-content">主頁</a>
                                </li>
                                <li>
                                    <a href="Shop" class="text-content">所有產品</a>
                                </li>
                                <li>
                                    <a href="About-Us" class="text-content">關於我們</a>
                                </li>
                                <li>
                                    <a href="Order" class="text-content">訂購方法</a>
                                </li>
                                <li>
                                    <a href="Institution" class="text-content">機構/學校訂購</a>
                                </li>
                                <li>
                                    <a href="Course" class="text-content">精選課程</a>
                                </li>
                            </ul>
                            <?php
                        } else{ ?>
                            <ul>
                                <li>
                                    <a href="Home" class="text-content">Home</a>
                                </li>
                                <li>
                                    <a href="Shop" class="text-content">All products</a>
                                </li>
                                <li>
                                    <a href="About-Us-EN" class="text-content">About</a>
                                </li>
                                <li>
                                    <a href="Order-EN" class="text-content">How to order</a>
                                </li>
                                <li>
                                    <a href="Institution-EN" class="text-content">Institution/School Order</a>
                                </li>
                                <li>
                                    <a href="Course" class="text-content">Courses</a>
                                </li>
                            </ul>
                            <?php
                        }
                        ?>

                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-sm-6  mt-3">
                    <div class="footer-contain mt-5">
                        <?php
                        if($_SESSION['language'] === 'CN'){
                            ?>
                            <ul>
                                <li>
                                    <a href="Living-Seeds-Children" class="text-content">活籽兒童服務社</a>
                                </li>
                                <li>
                                    <a href="Textbook-Download" class="text-content">教材下載</a>
                                </li>
                                <li>
                                    <a href="Sign-Up" class="text-content">會員計劃</a>
                                </li>
                                <li>
                                    <a href="<?php if($_SESSION['language'] === 'CN') echo 'privacy_policy.php'; else echo 'privacy_policy_en.php';?>" class="text-content">
                                        <?php if($_SESSION['language'] === 'CN') echo '私隱政策'; else echo 'Privacy Policy';?></a>
                                </li>
                                <li>
                                    <a href="<?php if($_SESSION['language'] === 'CN') echo 'terms_condition.php'; else echo 'terms_condition_en.php';?>" class="text-content">
                                        <?php if($_SESSION['language'] === 'CN') echo '條款細則'; else echo 'Terms and Condition';?></a>
                                </li>
                                <!--<li>
                                    <a href="Occupational-Therapy-Courses" class="text-content">精選課程</a>
                                </li>-->
                            </ul>
                            <?php
                        } else{ ?>
                            <ul>
                                <li>
                                    <a href="Living-Seeds-Children-EN" class="text-content">Wayshk Children Service Society</a>
                                </li>
                                <li>
                                    <a href="Course" class="text-content">Featured Courses</a>
                                </li>
                                <li>
                                    <a href="Textbook-Download" class="text-content">Resources Download</a>
                                </li>
                                <li>
                                    <a href="Sign-Up" class="text-content">Membership Program</a>
                                </li>
                                <li>
                                    <a href="<?php if($_SESSION['language'] === 'CN') echo 'privacy_policy.php'; else echo 'privacy_policy_en.php';?>" class="text-content">
                                        <?php if($_SESSION['language'] === 'CN') echo '私隱政策'; else echo 'Privacy Policy';?></a>
                                </li>
                                <li>
                                    <a href="<?php if($_SESSION['language'] === 'CN') echo 'terms_condition.php'; else echo 'terms_condition_en.php';?>" class="text-content">
                                        <?php if($_SESSION['language'] === 'CN') echo '條款細則'; else echo 'Terms and Condition';?></a>
                                </li>
                            </ul>
                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="sub-footer section-small-space">
            <div class="row">
                <div class="col-lg-4">
                    <div class="reserve">
                        <h6 class="text-content">©2023 Wayshk All rights reserved</h6>
                        <h6 class="text-content mt-2">powered by <a href="https://ngt-tech.io/home-zh" target="_blank">NGT TECH</a></h6>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="payment">
                        <img src="assets/images/payment/1.png" class="blur-up lazyload img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-md-end justify-content-center">
                    <div class="social-link">
                        <h6 class="text-content">Stay connected :</h6>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/wayshk000?mibextid=LQQJ4d" target="_blank">
                                    <i class="fa-brands fa-2x fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://instagram.com/ways_hk?igshid=YmMyMTA2M2Y=" target="_blank">
                                    <i class="fa-brands fa-2x fa-instagram"></i>
                                </a>
                            </li>

                            <li>
                                <a href="http://wa.me/85252657359" target="_blank">
                                    <i class="fa-brands fa-2x fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
