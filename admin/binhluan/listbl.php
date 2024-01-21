<div class="row2">
    <?php if(isset($thongbao)) echo $thongbao ?>
    <div class="row2 font_title">
        <h1>DANH SÁCH BÌNH LUẬN</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>NỘI DUNG</th>
                        <th>USER</th>
                        <th>IDUSER</th>
                        <th>IDPRODUCT</th>
                        <th>DATE</th>
                        <th colspan="">ACTION</th>
                    </tr>
                    <?php 
                    foreach ($listbinhluan as $binhluan) {
                        extract($binhluan);
                        $xoabl = "index.php?act=xoabinhluan&id=".$idbl;
                        echo '
                        <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>'.$idbl.'</td>
                        <td>'.$noidung.'</td>
                        <td>'.$user.'</td>
                        <td>'.$iduser.'</td>
                        <td>'.$id.'</td>
                        <td>'.$ngaybinhluan.'</td>
                        <td>
                       
                       <a href="'.$xoabl.'"><input type="button" value="Xóa"></a> 
                        </td>
                    </tr>
                        
                        
                        ';
                    }
                    ?>
                   
                  


                </table>
            </div>
            <div class="row mb10 ">
                <input class="mr20" type="button" value="CHỌN TẤT CẢ">
                <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
                <!-- <a href="index.php?act=addsp"> <input class="mr20" type="button" value="NHẬP THÊM"></a> -->
            </div>
        </form>
    </div>
</div>




</div>