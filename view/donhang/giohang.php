<!-- END HEADER -->

<main class="catalog  mb ">

    <div class="boxleft">
        <p style="color: red;"><?php if (isset($thongbao) && $thongbao != "") echo $thongbao ?></p>
        <div class="row2 font_title">
            <h1>Giỏ Hàng</h1>
        </div>
        <div class="row2 form_content ">
            <form action="index.php?act=thanhtoan" method="POST" style="text-align: center;">
                <div class="row2 mb10 formds_loai">
                    <table class="">
                        <tr>
                            <th></th>
                            <th>ẢNH</th>
                            <th>TÊN SẢN PHẨM</th>
                            <th>GIÁ TIỀN</th>
                            <th>SỐ LƯỢNG</th>
                            <th>TỔNG TIỀM</th>
                            <th colspan="" >TRẠNG THÁI</th>
                        </tr>

                        <?php
                        $tong = 0;
                        if (isset($listdonhang)) {
                            foreach ($listdonhang as  $giohang) {
                                extract($giohang);
                                $number = str_replace(',', '', $price);
                                $xoagh = "index.php?act=xoagh&idgh=" . $iddh;
                                $sum_price = $soluong * $number;
                                $tong += $sum_price;
                                $onclick = "onclick='return confirm('bạn có muốn xóa không')'";
                                echo '
                            <tr>
                                <td><input type="checkbox" name="thanhtoansp[]" value="' . $iddh . '"></td>
                                <td><img src="' . $url_image . '" alt="" class="image_gh"></td>
                                <td>' . $namepro . '</td>
                                <td>' . $price . '</td>
                                <td>' . $soluong . '</td>
                                <td>' . number_format($sum_price) . '</td>
                                <td>
                                <a href="' . $xoagh . '" '.$onclick.'><input type="button" value="Xóa"></a> 
                                </td>
                            </tr>
                                
                                ';
                            }
                            if (isset($tong)) {
                                echo '
                                    <tr>
                                    <td colspan="2" >Tổng Tiền </td>
                                    <td  colspan="6">' . number_format($tong) . '</td>
                                    </tr> 
                                    ';
                            }
                        }
                        ?>
                    </table>
                </div>
                <div class="row mb10 ">
                    <input class="mr20" type="button" value="Chọn Tất Cả" onclick="selectAll()">
                    <input class="mr20" type="button" value="Bỏ Chọn Tất Cả" onclick="deleteAll()">
                    <a href="index.php?act="> <input class="mr20" type="button" value="Tiếp Tục Mua Hàng"></a>
                    <input type="submit" value="Thanh Toán" name="thanhtoan">
                </div>
                <script>

                </script>
            </form>
        </div>

    </div>
    <?php
    include "view/boxright.php";
    ?>

</main>