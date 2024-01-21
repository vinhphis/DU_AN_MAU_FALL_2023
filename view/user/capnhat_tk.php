<!-- END HEADER -->

<main class="catalog  mb ">

    <div class="boxleft">

        <div class="box_title">Cập nhật tài khoản</div>
        <div class="box_content form_account">
            <?php

            if (isset($thongbao)) {

                echo $thongbao;
            }

            if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {

                extract($_SESSION['user']);
                $img = $img_path . $url_image;

            ?>
                <form action="index.php?act=update_tk" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="">Avata</label>
                        <input type="file" name="image_new">
                        <img src="<?php echo $img ?>" alt="" style="width: 100px; height: 100px; border-radius: 100%; object-fit: cover; ">
                    </div>
                    <div>
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="Email" value="<?php echo $email  ?>">
                    </div>
                    <div>
                        <label for=""> Tên đăng nhập</label>
                        <input type="text" disabled name="user" placeholder="Account" value="<?php echo $user ?>">
                    </div>
                    <div >
                        <label for=""> Mật khẩu</label>
                        <input type="password" name="pass" placeholder="Password" value="<?php echo $pass ?>" id="password" class="icon_mk">
                        
                        <div class="icon_mk_sub">
                            <i class="fa-solid fa-eye" onclick="togglePassword()" id="hien" style="display: none; position: absolute;"></i>
                            <i class="fa-solid fa-eye-slash" onclick="togglePassword()" id="an" style=" position: absolute;"></i>
                        </div>

                    </div>
                    <script>
                    
                    </script>
                    <div>
                        <label for="">Địa chỉ</label>
                        <input type="text" name="diachi" placeholder="Address" value="<?php echo $address ?>">
                    </div>
                    <div>
                        <label for=""> Số điện thoại</label>
                        <input type="text" name="sdt" placeholder="Phone" value="<?php echo $tel ?>">
                    </div>
                    <input type="hidden" name="id" id="" value="<?php echo $iduser ?>">
                    <input type="submit" value="Cập Nhật" name="capnhat">
                    <input type="reset" value="Nhập lại">
                </form>
            <?php

            } else {
                echo "không thấy session['user']";
            }

            ?>
        </div>

    </div>
    <?php
    include "view/boxright.php";
    ?>

</main>