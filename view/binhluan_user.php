<main class="catalog  mb ">
    <div class="boxleft">
        <?php if (isset($thongbao)) echo $thongbao ?>
        <div class="row2 font_title">
            <h1>DANH SÁCH BÌNH LUẬN</h1>
        </div>
        <div class="row2 form_content ">
            <form action="#" method="POST" style="text-align: center;">
                <div class="row2 mb10 formds_loai">
                    <table>
                        <tr>
                            <th></th>
                            <th>Ảnh</th>
                            <th>Nội Dung Bình Luận</th>
                            <th>DATE</th>
                            <th colspan="">ACTION</th>
                        </tr>
                        <?php
                        if (isset($binhluanuser)) {
                            foreach ($binhluanuser as $binhluan) {
                                extract($binhluan);
                                $xoabl = "index.php?act=xoabluser&idbl=" . $idbl;
                                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                                $hinhpath = $img_path . $img;

                                $hinh = "<img src='" . $hinhpath . "' alt='' height='80px' > ";

                                echo '
                        <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><a href="' . $linksp . '">' . $hinh . '</a></td>
                        <td>' . $noidung . '</td>
                        <td>' . $ngaybinhluan . '</td>
                        <td>
                        <a href="'.$xoabl.'"><input type="button" value="Xóa"></a> 
                      
                        </td>
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

                </div>
            </form>
        </div>
    </div>
    <?php
    include_once "view/boxright.php";
    ?>
</main>



</div>