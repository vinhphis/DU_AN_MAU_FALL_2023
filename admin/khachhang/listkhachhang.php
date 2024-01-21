<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH KHÁCH HÀNG</h1>
    </div>
    <!-- <a href="index.php?act=adddm" class="adddetail"> <input class="mr20" type="button" value="NHẬP THÊM"></a> -->
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <?php
                if (isset($thongbao) && $thongbao != "") {
                    echo $thongbao;
                }

                ?>
                <div><?php $thongbao ?></div>
                <table>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>IMAGE</th>
                        <th>USER</th>
                        <th>PASSWORD</th>
                        <th>EMAIL</th>
                        <th>ADDRESS</th>
                        <th>TEL</th>
                        <th>ROLE</th>
                        <th>ACTION</th>

                    </tr>
                    <?php
                    foreach ($listkhachhang as $khachhang) {
                        extract($khachhang);

                        $hinh = "/upload/" . $url_image;
                        if (is_array($hinh)) {
                            $image = "<img src='" . $hinh . "' alt=''>";
                        } else {
                            $image = "no photo";
                        }

                       
                        $xoakh = "index.php?act=xoakh&id=" . $iduser;
                        echo '<tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>' . $iduser . '</td>
                        <td>' . $image . '</td>
                        <td>' . $user . '</td>
                        <td>' . $pass . '</td>
                        <td>' . $email . '</td>
                        <td>' . $address . '</td>
                        <td>' . $tel . '</td>
                        <td>' . $role . '</td>
                        <td> 
                       
                        <a href="' . $xoakh . '" > <input type="button" value="Xóa" disabled> </a></td>
                    </tr>
                    
                        ';
                    }

                    ?>

                </table>
            </div>
            <div class="row mb10 ">
                <input class="mr20" type="button" value="CHỌN TẤT CẢ">
                <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
              
            </div>
            <div class="row mb10 ">
                <p>LƯU Ý </p> <br>
                <p > 0: Tài khoản bị ẩn</p> <br>
                <p> 1: Tài khoản admin</p> <br>
                <p> 2: Tài khoản khách</p> <br>
            </div>
        </form>
    </div>
</div>




</div>