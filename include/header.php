<?php
if (!isset($_SESSION['language'])) {
    $_SESSION['language'] = 'CN';
}

if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["quantity"])) {

                $productByCode = $db_handle->runQuery("SELECT * FROM product WHERE id ='" . $_GET["product_id"] . "'");
                //echo strtok($productByCode[0]["p_image"],',');
                $itemArray = array($productByCode[0]["id"] => array('name' => $productByCode[0]["p_name"], 'en_name' => $productByCode[0]["p_name_en"], 'image' => strtok($productByCode[0]["p_image"], ','), 'id' => $productByCode[0]["id"],
                    'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["product_price"], 'weight' => $productByCode[0]["product_weight"]));

                if (!empty($_SESSION["cart_item"])) {
                    if (in_array($productByCode[0]["id"], array_keys($_SESSION["cart_item"]))) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productByCode[0]["id"] == $k) {
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }

                echo "<script>
                document.cookie = 'alert = 10;';
                </script>";

            }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["product_id"] == $v['id']) {
                        unset($_SESSION["cart_item"][$k]);
                    }
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}

$total_quantity = 0;
$total_price = 0;
if (isset($_SESSION["cart_item"])) {
    foreach ($_SESSION["cart_item"] as $item) {
        $item_price = $item["quantity"] * $item["price"];
        $total_quantity += $item["quantity"];
        $total_price += ($item["price"] * $item["quantity"]);
    }
}
?>
<header class="pb-md-4 pb-0">
    <div class="header-top bg-dark">
        <div class="container-fluid-lg">
            <div class="row">
                <!--<div class="col-xxl-3 d-xxl-block d-none">
                    <div class="top-left-header">
                        <i class="fa-solid fa-location-dot text text-white"></i>
                        <span class="text-white">香港大圍成運路21-23號群力工業大廈3樓1室</span>
                    </div>
                </div>-->

                <div class="col-xxl-6 col-lg-9 d-lg-block d-none">
                    <div class="header-offer">
                        <div class="notification-slider">
                            <div>
                                <div class="timer-notification">
                                    <h6>
                                        <?php
                                        if ($_SESSION['language'] === 'CN') {
                                            ?>
                                            <strong class="me-1">
                                                歡迎來到Wayshk!
                                            </strong>
                                            <?php
                                        } else {
                                            ?>
                                            <strong class="me-1">Welcome to WaysHK!</strong>
                                            <?php
                                        }
                                        ?>


                                    </h6>
                                </div>
                            </div>

                            <!--<div>
                                <div class="timer-notification">
                                    <h6>Something you love is now on sale!
                                        <a href="Shop" class="text-white">Buy Now
                                            !</a>
                                    </h6>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <ul class="about-list right-nav-about">
                        <li class="right-nav-list">
                            <div class="dropdown theme-form-select">
                                <?php
                                if ($_SESSION['language'] === 'CN') {
                                    ?>
                                    <button class="btn dropdown-toggle" type="button" id="select-language"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="assets/images/country/hk-flag.png"
                                             class="img-fluid blur-up lazyload" alt="">
                                        <span>Hong Kong</span>
                                    </button>
                                    <?php
                                } else {
                                    ?>
                                    <button class="btn dropdown-toggle" type="button" id="select-language"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="assets/images/country/united-kingdom.png"
                                             class="img-fluid blur-up lazyload" alt="">
                                        <span>English</span>
                                    </button>
                                    <?php
                                }
                                ?>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="select-language">
                                    <li>
                                        <a class="dropdown-item" href="language.php?language=EN" id="english">
                                            <img src="assets/images/country/united-kingdom.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                            <span>English</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="language.php?language=CN" id="france">
                                            <img src="assets/images/country/hk-flag.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                            <span>Hong Kong</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="right-nav-list">
                            <div class="theme-form-select">
                                <button class="btn dropdown-toggle hkd" type="button" id="select-dollar"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    <span>HKD</span>
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="top-nav top-header sticky-header">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-top">
                        <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                                <span class="navbar-toggler-icon">
                                    <i class="fa-solid fa-bars"></i>
                                </span>
                        </button>
                        <a href="Home" class="web-logo nav-logo">
                            <img src="assets/images/logo/2.png" class="img-fluid blur-up lazyload" alt="">
                        </a>

                        <div class="middle-box">
                            <form action="Search-Result" method="post">
                                <div class="search-box">
                                    <div class="input-group">
                                        <input type="search" class="form-control" name="search" placeholder="<?php if ($_SESSION['language'] === 'CN') echo '我正在尋找'; else echo 'I am searching for';?>"
                                               aria-label="Recipient's username" aria-describedby="button-addon2" id="search">
                                        <button class="btn search-button-2" type="submit" name="search_button" id="button-addon2">
                                            <i data-feather="search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="rightside-box">
                            <div class="search-full">
                                <div class="input-group">
                                        <span class="input-group-text">
                                            <i data-feather="search" class="font-light"></i>
                                        </span>
                                    <input type="text" class="form-control search-type" placeholder="Search here..">
                                    <span class="input-group-text close-search">
                                            <i data-feather="x" class="font-light"></i>
                                        </span>
                                </div>
                            </div>
                            <ul class="right-side-menu">
                                <li class="right-side">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <div class="search-box">
                                                <i data-feather="search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="right-side">
                                    <a href="contact.php" class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <a href="tel:852 52657359">
                                                <i data-feather="phone-call"></i></a>
                                        </div>
                                    </a>
                                </li>
                                <li class="right-side">
                                    <div class="onhover-dropdown header-badge">
                                        <a href="Cart" class="btn p-0 position-relative header-wishlist">
                                            <i data-feather="shopping-cart"></i>
                                            <span class="position-absolute top-0 start-100 translate-middle badge"><?php echo $total_quantity; ?>
                                                    <span class="visually-hidden">unread messages</span>
                                                </span>
                                        </a>
                                    </div>
                                </li>
                                <li class="right-side onhover-dropdown">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                        <div class="delivery-detail">
                                            <h6><?php if($_SESSION['language'] === 'CN') echo '你好'; else echo 'Hello';?>,</h6>
                                            <?php
                                            if (isset($customer_id)) {
                                                $fetch_customer_name = $db_handle->runQuery("select customer_name from customer where id = '$customer_id'");
                                                $data = $db_handle->numrows("select customer_name from customer where id = '$customer_id'");
                                                for ($j = 0; $j < $data; $j++) {
                                                    $customer_name = $fetch_customer_name[$j]['customer_name'];
                                                } ?>
                                                <h5><?php echo $customer_name; ?></h5>
                                                <?php
                                            } else {
                                                ?>
                                                <h5><?php if ($_SESSION['language'] === 'CN') echo '客人'; else echo 'Guest'; ?></h5>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($customer_id)) {
                                        if ($_SESSION['language'] === 'EN') {
                                            ?>
                                            <div class="onhover-div onhover-div-login">
                                                <ul class="user-box-name">
                                                    <li class="product-box-contain">
                                                        <i></i>
                                                        <a href="profile.php">Profile</a>
                                                    </li>
                                                    <li class="product-box-contain">
                                                        <i></i>
                                                        <a href="Wish-List">Wishlist</a>
                                                    </li>
                                                    <li class="product-box-contain">
                                                        <i></i>
                                                        <a href="Logout">Logout</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="onhover-div onhover-div-login">
                                                <ul class="user-box-name">
                                                    <li class="product-box-contain">
                                                        <i></i>
                                                        <a href="profile.php">輪廓</a>
                                                    </li>
                                                    <li class="product-box-contain">
                                                        <i></i>
                                                        <a href="Logout">登出</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                    } else {
                                        if ($_SESSION['language'] === 'EN') {
                                            ?>
                                            <div class="onhover-div onhover-div-login">
                                                <ul class="user-box-name">
                                                    <li class="product-box-contain">
                                                        <i></i>
                                                        <a href="Login">Log In / Register</a>
                                                    </li>

                                                    <li class="product-box-contain">
                                                        <a href="Forgot">Forgot Password</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="onhover-div onhover-div-login">
                                                <ul class="user-box-name">
                                                    <li class="product-box-contain">
                                                        <i></i>
                                                        <a href="Login">登錄 / 登記</a>
                                                    </li>

                                                    <li class="product-box-contain">
                                                        <a href="Forgot">忘記密碼</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                        <?php
                                    }
                                    ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="header-nav">
                    <div class="header-nav-left">
                        <button class="dropdown-category dropdown-category-2">
                            <i data-feather="align-left"></i>
                            <?php if ($_SESSION['language'] === 'CN') {
                                ?>
                                <span>產品類別</span>
                                <?php
                            } else {
                                ?>
                                <span>All Categories</span>
                                <?php
                            } ?>
                        </button>

                        <div class="category-dropdown">
                            <div class="category-title">
                                <h5>Categories</h5>
                                <button type="button" class="btn p-0 close-button text-content">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>

                            <ul class="category-list">
                                <?php
                                $fetch_cat = $db_handle->runQuery("SELECT * FROM `category` where status = '1'");
                                $row = $db_handle->numRows("SELECT * FROM `category` where status = '1'");
                                for ($i = 0; $i < $row; $i++) {
                                    ?>
                                    <li class="">
                                        <a href="Shop?catId=<?php echo $fetch_cat[$i]['id'] ?>" class="category-name">
                                            <img src="assets/images/about_us/ways.png"
                                                 alt="">
                                            <h6><?php if ($_SESSION['language'] === 'CN') echo $fetch_cat[$i]['c_name']; else echo $fetch_cat[$i]['c_name_en']; ?></h6>
                                        </a>
                                    </li>
                                    <?php
                                }
                                ?>

                            </ul>
                        </div>
                    </div>

                    <div class="header-nav-middle">
                        <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                            <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                <div class="offcanvas-header navbar-shadow">
                                    <h5>Menu</h5>
                                    <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <?php
                                    if ($_SESSION['language'] === 'CN') {
                                        ?>
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a class="nav-link" href="Home">主頁</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="Shop">所有產品</i></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="About-Us">關於我們</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="Order">訂購方法</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                   data-bs-toggle="dropdown">更多 <i
                                                            class="fa-solid fa-angle-down"></i></a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="Institution">機構/學校訂購</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                           href="Living-Seeds-Children">活籽兒童服務社</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                           href="Course">精選課程</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                           href="Textbook-Download">教材下載</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                           href="Membership-Program">會員計劃</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <?php
                                    } else {
                                        ?>
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a class="nav-link" href="Home">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="Shop">All products</i></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="About-Us-EN">About</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="Order-EN">How to order</a>
                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                   data-bs-toggle="dropdown">More <i class="fa-solid fa-angle-down"></i></a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="Institution-EN">Institution/School
                                                            Order</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="Living-Seeds-Children-EN">Wayshk
                                                            Children Service Society</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="Course">Online Courses</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                           href="Textbook-Download-EN">Textbook Download</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                           href="Membership-Program-EN">Membership Program</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="header-nav-right">
                        <button class="btn deal-button" data-bs-toggle="modal" data-bs-target="#deal-box">
                            <i data-feather="zap"></i>
                            <?php
                            if($_SESSION['language'] === 'CN')
                                echo '<span>今日推介</span>';
                            else
                                echo '<span>Deal Today</span>';
                            ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- mobile fix menu start -->
<div class="mobile-menu d-md-none d-block mobile-cart" style="background: black;padding-top:17px;padding-bottom: 17px">
    <ul>
        <li class="active">
            <a href="Home">
                <i class="fa-solid fa-house text-white" style="font-size: 18px"></i>
            </a>
        </li>

        <li class="mobile-category">
            <a href="javascript:void(0)">
                <i class="fa-solid fa-border-all text-white" style="font-size: 18px"></i>
            </a>
        </li>

        <li>
            <a href="#" class="search-box">
                <i class="fa-solid fa-magnifying-glass text-white" style="font-size: 18px"></i>
            </a>
        </li>
        <li>
            <a href="Cart">
                <i class="fa-solid fa-cart-shopping text-white" style="font-size: 18px"></i>
            </a>
        </li>
    </ul>
</div>
<!-- mobile fix menu end -->
