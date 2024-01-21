<!-- END HEADER -->

<main class="catalog  mb ">

    <div class="boxleft">
        <?php
        if (!isset($_POST['success'])) {


        ?>
            <div class="box_title">Thông Tin Khách Hàng</div>
            <div class="box_content form_account thanhtoansp">

                <form action="index.php?act=billsp" method="post" style="text-align: center;">
                    <div>
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="Email" value="<?php echo $email  ?>">
                    </div>
                    <div>
                        <label for="">Tên người nhận</label>
                        <input type="text" name="user" placeholder="Account" value="<?php echo $user ?>">
                    </div>
                    <div>
                        <label for="">Địa chỉ</label>
                        <input type="text" name="diachi" placeholder="Address" value="<?php echo $address ?>">
                    </div>
                    <div>
                        <label for=""> Số điện thoại</label>
                        <input type="text" name="sdt" placeholder="Phone" value="<?php echo $tel ?>">
                    </div>

                    <label for="">Hình thức thanh toán</label>
                    <section class="httt">

                        <div class="thanhtoan">
                            <input type="radio" name="httt" id="" value="" checked>
                            <span>Nhận hàng khi thanh toán</span>
                        </div>
                        <div class="thanhtoan cktien">

                            <input type="radio" name="httt" id="" value="">
                            <span>Chuyển Khoản Ngân Hàng</span>

                            <picture class="child_ck">
                                <img src="/img/QRcode.jpg" alt="">
                            </picture>
                        </div>
                    </section>

                    <div class="row2 mb10 formds_loai">
                        <table class="">
                            <tr>

                                <th>ẢNH</th>
                                <th>TÊN SẢN PHẨM</th>
                                <th>GIÁ TIỀN</th>
                                <th>SỐ LƯỢNG</th>
                                <th>TỔNG TIỀN</th>

                            </tr>

                            <?php
                            $tong = 0;
                            if (isset($donhang)) {

                                foreach ($donhang as $spadd) {
                                    extract($spadd);
                                    $number = str_replace(',', '', $price);
                                    $sum_price = $soluong * $number;
                                    $tong += $sum_price;
                                    echo '
                                <tr>
                                
                                <input type="text" name="billsp[]" value="' . $iddh . '" // lấy mảng giá trị của id đơn hàng>
                                <input type="text" name="slsp[]" value="' . $soluong . '" // lấy mảng giá trị của số lượng >
                                <td><img src="' . $url_image . '" alt="" class="image_gh"></td>
                                <td>' . $namepro . '</td>
                                <td>' . $price . '</td>
                                <td>' . $soluong . '</td>
                                <td>' . number_format($sum_price) . '</td>
                                </tr>
                                
                                ';
                                }
                                if (isset($tong)) {
                                    echo '
                                    <tr>
                                    <td colspan="4" >Tổng Tiền </td>
                                    <td  colspan="6">' . number_format($tong) . '</td>
                                    </tr> 
                                    ';
                                }
                            }

                            ?>
                        </table>
                    </div>
                    <div class="btn_thanhtoandh">
                        <input type="submit" value="Thanh Toán Đơn Hàng" name="success" class="thanhtoandh" onclick="confirm('Bạn Đã Đặt Hàng Thành Công')">
                    </div>
                </form>

            </div>
        <?php } 
        // else {
        //     echo "Thanh toán thành công";
        // } 
        ?>
    </div>

    <?php
    include "view/boxright.php";
    ?>

</main>