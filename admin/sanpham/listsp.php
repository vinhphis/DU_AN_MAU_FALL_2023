<div class="row2">
    <div class="row2 font_title mb">
        <h1>DANH SÁCH HÀNG HÓA</h1>
    </div>

    <!-- form lọc sản phẩm - danh sách -->
    <form action="index.php?act=listsp" method="post" class="form_tk" style="float: left;">
        <!-- tìm kiếm theo tên sản phẩm -->
        <input type="text" name="kyw" placeholder="Nhập sản phẩm bạn muốn tìm">
        <!-- tìm kiếm theo danh mục -->
        <select name="iddm" id="" class="dmsp">
            <option value="0" selected>Tất cả</option>
            <?php foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                echo '  <option value="' . $id . '">' . $name . '</option>';
            }
            ?>
            <input type="submit" name="locsp" value="Tìm Kiếm" style="background-color: black; color: white;cursor: pointer;">
        </select>
    </form>
    <a href="index.php?act=addsp" class="adddetail"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
    <div class="row2 form_content ">
        <form action="#" method="POST" >
            <div class="row2 mb10 formds_loai" style="overflow: auto; height: 50vh;">

                <table  >

                    <tr style="position: sticky; top: 0;">
                        <th></th>
                        <th>ID</th>
                        <th>TÊN LOẠI</th>
                        <th>Giá</th>
                        <th>Image</th>
                        <th>Mô Tả</th>
                        <th>Mã Loại</th>
                        <th>ACTION</th>
                    </tr>


                    <?php
                    if (count($listsanpham) > 0) {
                        foreach ($listsanpham as $sanpham) {
                            extract($sanpham);

                            // Thêm ảnh
                            $image = "../upload/" . $img;
                            // kiểm tra xem đường dẫn ảnh
                            if (is_file($image)) {
                                $hinh = "<img src='" . $image . "' alt='' height='80'> ";
                            } else {
                                $hinh = "no photo";
                            }
                            // đường dẫn update và  xóa
                            $suasp = "index.php?act=suasp&id=" . $id;
                            $xoasp = "index.php?act=xoasp&id=" . $id;
                        
                            echo '
                                <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>' . $id . '</td>
                                        <td>' . $namesp . '</td>
                                        <td>$' . $price . '</td>
                                        <td>' . $hinh . '</td>
                                        <td>' . $mota . '</td>  
                                        <td>' . $iddm . '</td>
                                    <td> 
                                        <a href="' . $suasp . '"> <input type="button" value="Sửa"> </a>
                                        <a href="' . $xoasp . '"> <input type="button" value="Xóa"> </a> 
                                    </td>
                                </tr>
                                ';
                        }
                    } else {
                        $thongbao = "Không tìm thấy sản phẩn";
                    }

                    // }
                    ?>
                    <div><?php if (isset($thongbao) && $thongbao != "") echo $thongbao ?></div>

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