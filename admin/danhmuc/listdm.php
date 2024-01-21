<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH LOẠI HÀNG</h1>
    </div>
    <a href="index.php?act=adddm" class="adddetail"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
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
                        <th>TÊN LOẠI</th>
                        <th>ACTION</th>
                    </tr>
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        $suadm = "index.php?act=suadm&id=" . $id;
                        $xoadm = "index.php?act=xoadm&id=" . $id;
                        echo '
                    <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>' . $id . '</td>
                        <td>' . $name . '</td>
                        <td> 
                        <a href="' . $suadm . '"> <input type="button" value="Sửa"> </a>  
                        <a href="' . $xoadm . '"  > <input type="button" value="Xóa"> </a></td>
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
        </form>
    </div>
</div>




</div>