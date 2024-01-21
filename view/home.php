<main class="catalog  mb ">

    <div class="boxleft">
        <?php
        if (isset($thongbaogh)) {
            echo $thongbaogh;
        }
        ?>
        <div><?php $thongbaogh ?></div>
        <div class="banner">
            <img id="banner" src="../img/anhbanner (1).jpg" alt="">
            <button class="pre" onclick="pre()">&#10094;</button>
            <button class="next" onclick="next()">&#10095;</button>
        </div>
        <div class="items">
            <?php
            $i = 0;
            foreach ($spnew as $sp) {
                extract($sp);
                $hinh =  $img_path . $img;
                $image = "<img src='" . $hinh . "' alt=''>";
                if (($i == 2) || ($i == 5) || ($i == 8)) {
                    $mr = "";
                } else {
                    $mr = "mr";
                }
                $linksp = "index.php?act=sanphamct&idsp=" . $id;

                echo '<div class="box_items ' . $mr . '">
                
                    <div class="box_items_img">
                <a href="' . $linksp . '">' . $image . '</a>
                <form action="index.php?act=giohang" method="post">
                <input type="hidden" name="idsp" value="'  . $id . '">
                <input type="hidden" name="img" value="' . $hinh . '">
                <input type="hidden" name="name" value="' . $namesp . '">
                <input type="hidden" name="price" value="' . $price . '">
                <input type="submit" name="addcart" id="" value="ADD TO CART" class="add">
                </form>
             </div>
             <i class="fa-regular fa-heart heart_sp"></i>
              <a class="item_name" href="' . $linksp . '">' . $namesp . '</a>
              <p class="price">$' . $price . '</p>
              
           </div>';
                $i += 1;
            }


            ?>

            

        </div>

    </div>
    <?php
    include_once "view/boxright.php";
    ?>

</main>
<!-- BANNER 2 -->