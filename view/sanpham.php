<main class="catalog  mb ">
    <div class="boxleft">
        <div class="items">
            <?php

            $i = 0;
            if (count($dssp) > 0) {
                foreach ($dssp as $sanpham) {
                    extract($sanpham);
                    $hinh =  $img_path . $img;
                    $image = "<img src='".$hinh."' alt=''>";
                    $linksp = "index.php?act=sanphamct&idsp=" . $id;

                    if (($i == 2) || ($i == 5) || ($i == 8)) {
                        $mr = "";
                    } else {
                        $mr = "mr";
                    }

                    echo '
                <div class="box_items ' . $mr . '">
                
                <div class="box_items_img">
                   <a href="'.$linksp.'">'.$image.'</a>
                
                <form action="index.php?act=giohang" method="post">
                <input type="hidden" name="idsp" value="'  . $id . '">
                <input type="hidden" name="img" value="' . $hinh . '">
                <input type="hidden" name="name" value="' . $namesp . '">
                <input type="hidden" name="price" value="' . $price . '">
                <input type="submit" name="addcart" id="" value="ADD TO CART" class="add">
                </form>
                </div>
                   <a class="item_name" href="' . $linksp . '">' . $namesp . '</a>
                   <p class="price">$' . $price . '</p>
            
                </div>
            ';
                    $i += 1;
                }
            } else {
                $thongbao = "Không tìm thấy sản phẩm";
            }

            ?>

        </div>

        <div>
            <p style="color: red;"><?php if (isset($thongbao) && $thongbao != "") echo $thongbao ?></p>
        </div>
    </div>
    <?php
    include_once "view/boxright.php";
    ?>

</main>
<!-- BANNER 2 -->