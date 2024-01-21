<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM MỚI HÀNG HÓA</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
        <div class="row2 mb10 form_content_container">
                <label> Mã loại </label> <br>
                <select name="maloai" id="">
                    <option value="" hidden>-- Chọn Mã Loại --</option>
                    <?php foreach ( $listdanhmuc as $value) :
                        extract($value)?>
                    <option value="<?php echo $id ?>"><?php echo $name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="row2 mb10">
                <label>Tên loại </label> <br>
                <input type="text" name="tensp" placeholder="nhập vào tên sản phẩm">
            </div>
            <div class="row2 mb10">
                <label>Giá </label> <br>
                <input type="text" name="gialoai" placeholder="nhập vào giá sản phẩm">
            </div>
            <div class="row2 mb10">
                <label>Ảnh </label> <br>
                <input type="file" name="url_image">
            </div>
            <div class="row2 mb10">
                <label>Mô Tả </label> <br>
                <textarea name="mota" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="row mb10 ">
                <input class="mr20" type="submit" name="tsp" value="THÊM MỚI">
                <input class="mr20" type="reset" value="NHẬP LẠI">

                <a href="index.php?act=listsp"><input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if (isset($thongbao) && $thongbao != "") {
                echo $thongbao;
            }

            ?>
            <div><?php $thongbao ?></div>
        </form>
    </div>
</div>