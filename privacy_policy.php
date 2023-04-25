<?php
session_start();
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
    <title>User Profile</title>

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
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2 class="mb-2">收集個人資料及私隱政策聲明</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active"><a href="privacy_policy_en.php">EN</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- log in section start -->
<section class="log-in-section background-image-2 section-b-space">
    <div class="container-fluid-lg w-100">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-5 inner-header">收集個人資料及私隱政策聲明</h1>
                <ul>
                    <li>活籽兒童用品店非常重視個人私隱，並確保轄下之服務於任何情況下收集、使用、儲存、轉移及查閱個人資料之程序均符合香港的《個人資料(私隱)條例》的要求。我們將確保我們的職員嚴格遵守本收集個人資料聲明及我們的私隱聲明。請細閱下文以了解我們的收集個人資料政策。</li>
                </ul>
                <h4 class="mt-3" style="font-weight: bold">一、隱私權保護政策的適用範圍</h4>
                <ul>
                    <li><i class="fa-solid fa-check"></i> 隱私權保護政策內容，包括本網站如何處理在您使用網站服務時收集到的個人識別資料。隱私權保護政策不適用於本網站以外的相關連結網站，也不適用於非本網站所委託或參與管理的人員。 </li>
                </ul>
                <h4 class="mt-3" style="font-weight: bold">二、個人資料的蒐集、處理及利用方式</h4>
                <ul>
                    <li><i class="fa-solid fa-check"></i> 當您造訪本網站或使用本網站所提供之功能服務時，我們將視該服務功能性質，請您提供必要的個人資料，並在該特定目的範圍內處理及利用您的個人資料；非經您書面同意，本網站不會將個人資料用於其他用途。
                    </li>
                    <li><i class="fa-solid fa-check"></i> 本網站在您使用購物車、服務信箱等功能時，會保留您所提供的姓名、電子郵件地址、聯絡方式及使用時間等。
                    </li>

                    <li>
                        <i class="fa-solid fa-check"></i> 本網站將用你提供的個人資料，向你提供所需要的產品、活動、課程或服務，包括參與活動、課程或服務的相關用途、簽發收據、收集意見及資料分析。同時亦會使用你的個人資料向你提供有關活籽兒童用品店及有關單位的相關活動、課程、服務等推廣資訊。閣下有責任提供申請表格上列為「必填」的資料，或啟動相關流程必須提供的資料，否則本公司有可能無法提供閣下要求之服務。
                    </li>
                    <li><i class="fa-solid fa-check"></i> 於一般瀏覽時，伺服器會自行記錄相關行徑，包括您使用連線設備的IP位址、使用時間、使用的瀏覽器、瀏覽及點選資料記錄等，做為我們增進網站服務的參考依據，此記錄為內部應用，決不對外公佈。
                    </li>
                    <li><i class="fa-solid fa-check"></i> 您可以隨時向我們提出請求，以更正或刪除您的帳戶或本網站所蒐集的個人資料等隱私資訊。聯繫方式請見最下方聯繫管道。
                    </li>

                </ul>
                <h4 class="mt-3" style="font-weight: bold">三、資料之保護</h4>
                <ul>
                    <li><i class="fa-solid fa-check"></i> 本網站主機均設有防火牆、防毒系統等相關的各項資訊安全設備及必要的安全防護措施，加以保護網站及您的個人資料採用嚴格的保護措施，只由經過授權的人員才能接觸您的個人資料，相關處理人員皆簽有保密合約，如有違反保密義務者，將會受到相關的法律處分。
                    </li>
                    <li><i class="fa-solid fa-check"></i> 如因業務需要有必要委託其他單位提供服務時，本網站亦會嚴格要求其遵守保密義務，並且採取必要檢查程序以確定其將確實遵守。
                    </li>
                </ul>

                <h4 class="mt-3" style="font-weight: bold">四、網站對外的相關連結</h4>
                <ul>
                    <li><i class="fa-solid fa-check"></i> 本網站的網頁提供其他網站的網路連結，您也可經由本網站所提供的連結，點選進入其他網站。但該連結網站不適用本網站的隱私權保護政策，您必須參考該連結網站中的隱私權保護政策</li>
                </ul>

                <h4 class="mt-3" style="font-weight: bold">五、與第三人共用個人資料之政策</h4>

                <ul>
                    <li><i class="fa-solid fa-check"></i> 本網站絕不會提供、交換、出租或出售任何您的個人資料給其他個人、團體、私人企業或公務機關，但有法律依據或合約義務者，不在此限。</li>
                </ul>
                <h4 class="mt-3" style="font-weight: bold">六、Cookie之使用</h4>
                <ul>
                    <li><i class="fa-solid fa-check"></i>為了提供您最佳的服務，本網站會在您的電腦中放置並取用我們的Cookie，若您不願接受Cookie的寫入，您可在您使用的瀏覽器功能項中設定隱私權等級為高，即可拒絕Cookie的寫入，但可能會導至網站某些功能無法正常執行 。</li>
                </ul>
                <h4 class="mt-3" style="font-weight: bold">七、隱私權保護政策之修正</h4>
                <ul>
                    <li><i class="fa-solid fa-check"></i> 本網站隱私權保護政策將因應需求隨時進行修正，修正後的條款將刊登於網站上。</li>
                </ul>
                <h4 class="mt-3" style="font-weight: bold">八、聯繫管道</h4>
                <ul>
                    <li><i class="fa-solid fa-check"></i> 對於本站之隱私權政策有任何疑問，或者想提出變更、移除個人資料之請求，請前往本站「聯絡我們」頁面提交表單。</li>
                    <li><i class="fa-solid fa-check"></i> 或者 Email 至：ways00.hk@gmail.com</li>

                </ul>
            </div>
        </div>
    </div>
</section>
<!-- log in section end -->

<!-- Footer Section Start -->
<?php
include('include/footer.php');
?>
<!-- Footer Section End -->

<!-- Deal Box Modal Start -->
<?php include ('include/deal.php');?>
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

<!-- Bootstrap js-->
<script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap/popper.min.js"></script>

<!-- feather icon js-->
<script src="assets/js/feather/feather.min.js"></script>
<script src="assets/js/feather/feather-icon.js"></script>

<!-- Slick js-->
<script src="assets/js/slick/slick.js"></script>
<script src="assets/js/slick/slick-animation.min.js"></script>
<script src="assets/js/slick/custom_slick.js"></script>

<!-- Lazyload Js -->
<script src="assets/js/lazysizes.min.js"></script>

<!-- script js -->
<script src="assets/js/script.js"></script>

<!-- thme setting js -->
<script src="assets/js/theme-setting.js"></script>
</body>
</html>

