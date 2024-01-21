<?php
if (is_array($listsanpham)) {
    extract($listsanpham);
}
$image = "../upload/" . $img;
if (is_file($image)) {
    $hinh = "<img src='" . $image . "' alt='' height='80'> ";
} else {
    $hinh = "no photo";
}
?>
<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM MỚI HÀNG HÓA</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=updatesp&id=<?php echo $new_id?>" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <label> Mã loại </label> <br>
                <select name="maloai" id="">
                    <?php foreach ($listdanhmuc as $danhmuc) :
                        extract($danhmuc);
                        if ($iddm == $id)  echo '<option value="' . $id . '" selected> ' . $name . '</option>';
                        else  echo '<option value="' . $id . '"> ' . $name . '</option>';
                    endforeach; ?>
                </select>
            </div>
            <div class="row2 mb10">
                <label>Tên Sản Phẩm </label> <br>
                <input type="text" name="tensp" placeholder="nhập vào tên sản phẩm" value="<?php if ($namesp != "") echo  $namesp ?>">
            </div>
            <div class="row2 mb10">
                <label>Giá </label> <br>
                <input type="text" name="gialoai" placeholder="nhập vào giá sản phẩm" value="<?php if ($price != "") echo  $price ?>">
            </div>
            <div class="row2 mb10">
                <label>Ảnh </label> <br>
                <input type="file" name="hinh">
               <?php echo $hinh ;?>
            </div>
            <div class="row2 mb10">
                <label>Mô Tả </label> <br>
             <textarea name="mota" id="" cols="100" rows="10" ><?php echo $mota ?></textarea>
            </div>
            <div class="row mb10 ">
                <input class="mr20" type="submit" name="capnhat" value="update">
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