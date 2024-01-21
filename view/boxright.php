<div class="boxright">

    <p style="color: red;">
        <!-- Hiện thị  -->
        <?php
        if (isset($loginMess) && $loginMess != '') {
            echo $loginMess;
        } ?>
    </p>
    <div class="mb">
        <div class="box_title">
            <p>TÀI KHOẢN</p>
          
        </div>
        <?php if (!isset($_SESSION['user'])) { ?>
            <div class="box_content form_account">
                <form action="index.php?act=dangnhap" method="POST">
                    <h4>Tên đăng nhập</h4><br>
                    <input type="text" name="user" id="">
                    <h4>Mật khẩu</h4><br>
                    <input type="password" name="pass" id="password" style="position: relative;"><br>
                    <div style="position: absolute; right: 120px; top: 345px;">
                        <i class="fa-solid fa-eye" onclick="togglePassword()" id="hien" style="display: none; position: absolute;"></i>
                        <i class="fa-solid fa-eye-slash" onclick="togglePassword()" id="an" style=" position: absolute;"></i>
                    </div>
                    <input type="checkbox" name="ghinho_tk" id="">Ghi nhớ tài khoản?
                    <br><input type="submit" value="Đăng nhập" name="dangnhap">
                    <br>

                </form>

                <li class="form_li"><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                <li class="form_li"><a href="index.php?act=dangky">Đăng kí thành viên</a></li>
            </div>
        <?php } else {
            extract($_SESSION['user']);
            $img = $img_path . $url_image;
        ?>
            <div class="mb profile">
                <picture class="avata">
                    <img src="<?php echo $img ?>" alt="" title="Profile">
                </picture>
                <ul class="detail">
                    <li style="color: black;">Hello <strong style="color: black;"><?php echo $user  ?></strong></li>
                    <li class="form_li"><a href="index.php?act=update_tk">Cập Nhật Tài Khoản</a></li>
                    <li class="form_li"><a href="index.php?act=lsmuahang">Lịch Sử Mua Hàng</a></li>
                    <li class="form_li"><a href="index.php?act=binhluanuser">Lịch Sử Bình Luận</a></li>
                    <?php
                    if ($role == 1) {
                    ?>
                        <li class="form_li"><a href="admin/index.php?act=">Quản Lý Admin</a></li>
                    <?php                  }
                    ?>
                    <li class="form_li"><a href="index.php?act=dangxuat">Đăng Xuất</a></li>
                </ul>

            </div>
        <?php } ?>
    </div>
    <div class="mb">
        <div class="box_title">DANH MỤC</div>
        <div class="box_content2 product_portfolio">
            <ul>
                <?php
                foreach ($dsdm as $dm) {
                    extract($dm);
                    $linkdm = "index.php?act=sanpham&iddm=" . $id;
                    echo '<li><a href="' . $linkdm . '">' . $name . ' </a></li>';
                }
                ?>
            </ul>

        </div>

    </div>
    <!-- DANH MỤC SẢN PHẨM BÁN CHẠY -->
    <div class="mb">
        <div class="box_title">SẢN PHẨM BÁN CHẠY</div>
        <div class="box_content">
            <?php
            foreach ($dstop10 as $sp) {
                extract($sp);
                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                $img = $img_path . $img;
                echo '<div class="selling_products" style="width:100%;">
                
                  <a href="' . $linksp . '">  <img src="' . $img . '" alt="anh"></a>
                  <a href="' . $linksp . '">' . $namesp . '</a>
                </div>';
            }
            ?>
        </div>
    </div>
</div>