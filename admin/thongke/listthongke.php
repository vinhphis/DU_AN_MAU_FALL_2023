<div class="row2">
  <div class="row2 font_title">
    <h1>Danh Sách Thống Kê</h1>
  </div>
  <div class="row2 form_content ">
    <!-- <form action="index.php?act=listsp" method="post" class="mb "> -->
    <!-- tìm kiếm theo tên sản phẩm -->
    <!-- <input type="text" name="kyw" placeholder="Nhập sản phẩm bạn muốn tìm"> -->
    <!-- tìm kiếm theo danh mục -->
    <!-- <select name="iddm" id="">
            <option value="0" selected>Tất cả</option>
            <?php foreach ($listdanhmuc as $danhmuc) {
              extract($danhmuc);
              echo '  <option value="' . $id . '">' . $name . '</option>';
            }
            ?>
            <input type="submit" name="locsp" value="Tìm Kiếm">
        </select>
    </form> -->

    <div class="row2 form_content ">
      <form action="#" method="POST">
        <div class="row2 mb10 formds_loai">

          <table>

            <tr>
              <th></th>
              <th>ID</th>
              <th>TÊN DANH MỤC </th>
              <th>GIÁ CAO NHẤT</th>
              <th>GIÁ THẤP NHẤT</th>
              <th>SỐ LƯỢNG</th>
              <th>GIÁ TRUNG BÌNH</th>
              <th>TRẠNG THÁI</th>
            </tr>


            <?php
            if (count($listthongke) > 0) {
              foreach ($listthongke as $thongke) {
                extract($thongke);
                if ($maxprice != null && $minprice != null) {
                  // $max = floatval(str_replace(",", "", $maxprice));
                  // $min = floatval(str_replace(",", "", $minprice));
                  $gia_trungbinh = ($maxprice + $minprice) / 2;
                  
                } else {
                  $maxprice = $minprice = 0;
                  $gia_trungbinh = 0;
                }
                // đường dẫn update và  xóa
                // $suasp = "index.php?act=suasp&id=" . $id;
                // $xoasp = "index.php?act=xoasp&id=" . $id;

                echo '
                                <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>' . $id . '</td>
                                        <td>' . $name . '</td>
                                        <td>' . $maxprice . '</td>
                                        <td>' . $minprice . '</td>  
                                        <td>' . $countsp . '</td>
                                        <td>' . number_format($gia_trungbinh) . '</td>
                                    <td> 
                                       
                                    </td>
                                </tr>
                                ';
              }
            }

            // }
            ?>
            <div><?php if (isset($thongbao) && $thongbao != "") echo $thongbao ?></div>

          </table>
        </div>
        <div class="row mb10 ">
          <input class="mr20" type="button" value="CHỌN TẤT CẢ">
          <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
          <a href="index.php?act=bieudo"> <input class="mr20" type="button" value="Biểu Đồ"></a>
        </div>
      </form>


    </div>
  </div>