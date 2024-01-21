<!-- END HEADER -->

<main class="catalog  mb ">

    <div class="boxleft">
        <p style="color: red;"><?php if (isset($thongbao) && $thongbao != "") echo $thongbao ?></p>
        <div class="row2 font_title">
            <h1>Lịch Sử Mua Hàng</h1>
        </div>
        <div class="row2 form_content ">
            <form action="index.php?act=thanhtoan" method="POST" style="text-align: center;">
                <div class="row2 mb10 formds_loai">
                    <table class="">
                        <tr>
                            <!-- <th></th> -->
                            <th>ẢNH</th>
                            <th>TÊN SẢN PHẨM</th>
                            <!-- <th>PRICE</th> -->
                            <th>SỐ LƯỢNG</th>
                            <th>ĐƠN GIÁ</th>
                            <th>NGÀY MUA</th>
                            <th>TRẠNG THÁI</th>
                            <th></th>
                        </tr>
                        <?php

                        if (isset($billsp)) {
                            foreach ($billsp as  $bill) {
                                extract($bill);
                                $number = str_replace(',', '', $price);
                                $img = "<img src='$url_image' alt='' class='image_gh'>";
                                $linksp = "<a href='index.php?act=sanphamct&idsp=$idsp'>$img</a> ";
                                $sum_price = $soluong * $number;
                                if ($status == "1") {
                                    $action = "<p class='success' value='1'> Đã Thanh Toán </p>";
                                    $xoagh = " <a href='index.php?act=xoasoft&iddh=$iddh'><input type='button' value='Hủy Đơn Hàng'></a> ";
                                } else if ($status == "2") {
                                    $action = "<p class='canced' value='1'> Đã Hủy </p>";
                                    $xoagh = "";
                                }
                                echo '
                            <tr>                            
                                <td>' . $linksp . '</td>
                                <td>' . $namepro . '</td>
                                <td>' . $soluong . '</td>
                                <td>' . number_format($sum_price) . '</td>
                                <td>' . $ngaymuahang . '</td>
                                <td>' . $action . '</td>
                                <td>' . $xoagh . ' </td>
                            </tr>
                                
                                ';
                            }
                        }

                        ?>
                    </table>
                </div>
                <div class="row mb10 ">
                </div>

            </form>
        </div>

    </div>
    <?php
    include "view/boxright.php";
    ?>

</main>