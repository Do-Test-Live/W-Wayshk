<div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title w-100" id="deal_today"><?php if($_SESSION['language'] === 'CN') echo '今天交易'; else echo 'Deal Today';?></h5>
                    <p class="mt-1 text-content"><?php if($_SESSION['language'] === 'CN') echo '為您推薦優惠。'; else echo 'Recommended deals for you.';?></p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="deal-offer-box">
                    <ul class="deal-offer-list">
                        <?php
                        $product = $db_handle->runQuery("select * from product WHERE status= '1' and deal_today = '1' order by rand()");
                        $row = $db_handle->numRows("select * from product WHERE status= '1' and deal_today = '1' order by rand()");
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
                                        <h5><?php if($_SESSION['language'] === 'CN')echo $product[$i]['p_name']; else echo $product[$i]['p_name_en'];?></h5>
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