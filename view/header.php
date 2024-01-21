<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dự án mẫu</title>
  <link rel="stylesheet" href="css/css.css">
  <script src="https://kit.fontawesome.com/509cc166d7.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
  <div class="boxcenter">
    <!-- BIGIN HEADER -->
    <header>
      <div class="row  header">
        <div class="logo">
          <a href="index.php?act=" style="color: white; padding-left: 50px;">Dự án mẫu - Fpoly</a>
        </div>

        <div class="box_search">
          <form action="index.php?act=sanpham" method="POST">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="" placeholder="Từ khóa tìm kiếm" name="keyword" class="tksp">
          </form>
        </div>

        <div class="box_action">

          <div class="box_action_child">
            <i class="fa-solid fa-phone-volume" style="color: white; height: 25px; margin-right: 5px;"></i>
            <span>
              <p style="color: white; font-size: 13px;">Gọi Mua Hàng</p>
              <p style="color: white; font-size: 13px;">098.xxxx.xxx</p>
            </span>
          </div>

          <div class="box_action_child">
            <a href="index.php?act=giohang" title="Giỏ Hàng" class="giohang_sp">
              <i class="fa-solid fa-cart-shopping"></i> <br>
             
              <p style="color: white; font-size: 17px;">Giỏ Hàng</p>
          
            </a>
           
          </div>
        </div>
      </div>

      <div class="row mb menu">
        <ul>


          <?php
          try {
          ?>
            <li class="dropdown">
              <i class="fa-solid fa-laptop" style="color: white;"></i>
              <span style="color: white;">
                <a class="dropdownbtn" href="index.php?act=sanpham&iddm=1">Laptop</a>
              </span>
            </li>

            <li class="dropdown">
              <i class="fa-solid fa-mobile-screen-button" style="color: white;"></i>
              <span style="color: white;">
                <a class="dropdownbtn" href="index.php?act=sanpham&iddm=2">Điện Thoại</a>
              </span>
            </li>

            <li class="dropdown">
              <i class="fa-solid fa-display" style="color: white;"></i>
              <span style="color: white;">
                <a class="dropdownbtn" href="index.php?act=sanpham&iddm=6">Destop</a>
              </span>
            </li>

            <li class="dropdown" style="margin-left: -20px;">
              <i class="fa-solid fa-tablet-screen-button" style="color: white;"></i>
              <span style="color: white;">
                <a class="dropdownbtn" href="index.php?act=sanpham&iddm=15">Ipad</a>
              </span>
            </li>


            <li class="dropdown" style="margin-left: -30px;">
              <i class="fa-regular fa-keyboard" style="color: white;"></i>
              <span style="color: white;">
                <a class="dropdownbtn" href="index.php?act=sanpham&iddm=16">Bàn Phím</a>
              </span>
            </li>


            <li class="dropdown">
              <i class="fa-solid fa-headphones" style="color: white;"></i>
              <span style="color: white;">
                <a class="dropdownbtn" href="index.php?act=sanpham&iddm=23">Phụ Kiện</a>
              </span>
            </li>


            <li class="dropdown">
              <i class="fa-solid fa-tv" style="color: white;"></i>
              <span style="color: white;">
                <a class="dropdownbtn" href="index.php?act=sanpham&iddm=18">Tv</a>
              </span>
            </li>
          <?php
          } catch (Exception $e) {
            echo "Không tìm thấy trang danh mục này";
          }
          ?>
        </ul>
      </div>
    </header>
    <!-- END HEADER -->