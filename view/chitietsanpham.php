<main class="catalog  mb ">
    <div class="boxleft">

        <?php
        extract($sanpham);
        $img = $img_path . $img;
        ?>

        <div class="mb">
            <form action="index.php?act=giohang" method="post">
                <div class="box_title">
                    <?php echo $name; ?>
                </div>
                <div class="box_content">
                    <div class="box_content_ctsp">
                        <picture>
                            <?php echo "<img src='$img' width='300' class='hove_ctsp'>"; ?>
                        </picture>
                        <div class="box_content_detail">
                            <h2 style="margin-bottom: 10px;"><?php echo $namesp ?></h2>
                            <p style="margin-bottom: 20px; color: red;">$<?php echo $price ?></p>
                            <input type="submit" value="ADD TO CART" name="addcart" class="cart_ctsp">
                        </div>
                    </div>
                    <div class="box_content_ctsp_mota">
                        <h3>Mô Tả Sản Phẩm</h3>
                        <?php echo "<p>$mota</p>"; ?>
                    </div>
                    <?php
                    echo '
                    <input type="hidden" name="idsp" value="'  . $id . '">
                    <input type="hidden" name="img" value="' . $img . '">
                    <input type="hidden" name="name" value="' . $namesp . '">
                    <input type="hidden" name="price" value="' . $price . '">
                    ';
                    ?>

                </div>
            </form>
        </div>

        <div class="">
            <?php if (isset($thongbao)) echo $thongbao ?>
            <div class="box_title">Đánh Giá Sản Phẩm</div>
            <div class="box_content2  product_portfolio binhluan  ">
                <?php foreach ($binhluan as $value) : ?>
                    <table class="form_binhluan">
                        <tr>
                            <td><strong><?php echo $value['user'] ?></strong> <?php echo $value['noidung'] ?></td>
                        </tr>
                        <tr>

                            <td style="color: gray; font-size: 13px;"><?php echo  date("Y-m-d H:i:s", strtotime($value['ngaybinhluan'])) ?></td>
                        </tr>

                    </table>
                <?php endforeach; ?>
            </div>
            <div class="box_comment mb">
                <?php if ($_SESSION) { ?>
                    <form action="index.php?act=sanphamct&idsp=<?= $id ?>" method="POST">
                        <input type="hidden" name="idpro" value="<?= $id ?>">
                        <input type="text" name="noidung" placeholder="Nhập nội dung đánh giá">
                        <input type="submit" name="guibinhluan" value="Gửi ">
                    </form>
                <?php } else { ?>
                    <div>
                        <p>Đăng nhập để bình luận</p>
                    </div>
                <?php } ?>
            </div>

        </div>

        <div class=" mb">
            <div class="box_title">SẢN PHẨM CÙNG LOẠI</div>
            <div class="box_content box_item_spcungloai">
                <?php
                $i = 0;
                foreach ($sanphamcl as $value) :
                    extract($value);
                    $hinh =  $img_path . $img;
                    $url_image =  '<img src="' . $hinh . '" alt="">';
                    $linksp = "index.php?act=sanphamct&idsp=" . $id;
                    echo '
            <div class="box_items "  >
                <div class="box_items_img">
                   <a href= "' .$linksp.' ">' . $url_image . '</a>
    
                    <form action="index.php?act=giohang" method="post">
                    <input type="hidden" name="idsp" value="'  . $id . '">
                    <input type="hidden" name="img" value="' . $hinh . '">
                    <input type="hidden" name="name" value="' . $namesp . '">
                    <input type="hidden" name="price" value="' . $price . '">
                    <input type="submit" name="addcart" id="" value="ADD TO CART" class="add">
                    </form>
                </div>
                    <a class="item_name" href="' . $linksp . '">' . $namesp . '</a>
                    <p class="price">$' . $price . '</p>
            </div>
           ';
                    $i += 1;
                endforeach;
                ?>
            </div>
        </div>
    </div>
    <?php
    include "view/boxright.php";
    ?>

</main>