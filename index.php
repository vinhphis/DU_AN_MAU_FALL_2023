<?php
session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/binhluan.php";
include "model/taikhoan.php";
include "model/donhang.php";
if (isset($_SESSION['user'])) {
    extract($_SESSION['user']);
    $iduser;
} else {
    echo "";
}

include "view/header.php";
include "global.php";

$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$dstop10 = loadall_sanpham_top10();

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
            // sản phẩm
        case "sanpham":
            if (isset($_POST['keyword']) &&  $_POST['keyword'] != 0) {
                $kyw = $_POST['keyword'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }

            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include "view/sanpham.php";
            break;
        case "sanphamct":

            if (isset($_POST['guibinhluan'])) {
                if (empty($_POST['noidung'])) {
                    $thongbao = "Vui lòng nhập bình luận";
                } else {
                    insert_binhluan($_POST['idpro'], $_POST['noidung']);
                    $thongbao = "Thêm bình luận thành công";
                }
            }
            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                $sanpham = loadone_sanpham($_GET['idsp']);
                $sanphamcl = load_sanpham_cungloai($_GET['idsp'], $sanpham['iddm']);
                $binhluan = loadall_binhluan($_GET['idsp']);
                include "view/chitietsanpham.php";
            } else {
                include "view/home.php";
            }
            break;

            // user
        case "dangky":
            if (isset($_POST['dangky']) && ($_POST['dangky'] != "")) {
                $email = $_POST['email'];
                $name = $_POST['user'];
                $pswd = $_POST['pass'];
                insert_taikhoan($email, $name, $pswd);
                $thongbao = "Đăng ký thành công";
            }
            include "view/user/dangky.php";
            break;
        case "dangnhap":
            if (isset($_POST['dangnhap'])) {
                $acc = $_POST['user'];
                $pass = $_POST['pass'];
                $loginMess = dangnhap($acc, $pass);
            }
            include "view/home.php";
            break;
        case "dangxuat":
            dangxuat();
            include "view/home.php";
            break;
        case "quenmk":
            if (isset($_POST['guiemail'])) {
                $email = $_POST['email'];
                $sendMailMess = sendMail($email);
            }
            include "view/user/quenmk.php";
            break;
        case "update_tk":

            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $target_dir = "upload/";
                $target_file = $target_dir . basename($_FILES['image_new']['name']);
                $image = $_FILES['image_new']['name'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $address = $_POST['diachi'];
                $tel = $_POST['sdt'];
                $iduser = $_POST['id'];
                move_uploaded_file($_FILES['image_new']['tmp_name'], $target_file);

                update_taikhoan($iduser, $image, $pass, $email, $address, $tel);
                $thongbao = "Cập nhật thành công, vui lòng đăng nhập lại để cập nhật dữ liệu";
            }

            include 'view/user/capnhat_tk.php';
            break;

            // giỏ hàng
        case "giohang":
            if (!isset($_SESSION['user'])) {
                $thongbaogh = "Vui lòng đăng nhập để tiếp tục mua hàng";
                include "view/home.php";
            } else {
                if (isset($_POST['addcart']) && !empty($_POST['addcart'])) {
                    $idsp = $_POST['idsp'];
                    $url_image = $_POST['img'];
                    $namepro = $_POST['name'];
                    $price = $_POST['price'];
                    $soluong = 1;
                    $sum_price =  str_replace(',', '', $price) * $soluong;
                    add_donhang($namepro, $url_image, $price, $soluong, $sum_price, $idsp, $iduser);
                    $thongbao = "Thêm thành công";
                }
                $listdonhang = load_donhang($iduser);
                include "view/donhang/giohang.php";
            }

            break;
        case "xoagh":
            if (isset($_GET['idgh'])) {
                $iddh = $_GET['idgh'];
                delete_donhang($iddh);
                $thongbao = "Xóa đơn hàng thành công";
            }
            $listdonhang = load_donhang($iduser);
            include "view/donhang/giohang.php";
            break;

        case "thanhtoan":

            if (isset($_POST['thanhtoan']) && ($_POST['thanhtoan'])) {

                if (isset($_POST['thanhtoansp']) && ($_POST['thanhtoansp'])) {
                    $result = join(",", $_POST['thanhtoansp']);
                    $donhang = load_thanhtoan($result);
                    include "view/donhang/thanhtoan.php";
                } else {
                    $thongbao = "Vui lòng chọn sản phẩm";
                    $listdonhang = load_donhang($iduser);
                    include "view/donhang/giohang.php";
                }
            }

            
            break;
        case "billsp":
            if (isset($_POST['success']) && ($_POST['success'])) {
                $result = join(",", $_POST['billsp']);
                add_billsp($result);
            }
            include "view/home.php";
            break;
        case "lsmuahang":
            $billsp = load_billsp($iduser);
            include "view/donhang/lichsumuahang.php";
            break;

        case "xoasoft":
            if (isset($_GET['iddh'])) {
                delete_billsp($_GET['iddh']);
            }
            $billsp = load_billsp($iduser);
            include "view/donhang/lichsumuahang.php";
            break;

            // bình luận
        case "binhluanuser":
            if (isset($iduser)) {
                $binhluanuser = loadall_binhluan_user($iduser);
            } else {
                $thongbao = "Vui lòng đăng nhập để vào trang bình luận";
            }
            include "view/binhluan_user.php";
            break;
        case "xoabluser":
            if (isset($_GET['idbl'])) {
                delete_binhluan($_GET['idbl']);
            }
            $binhluanuser = loadall_binhluan_user($iduser);
            include "view/binhluan_user.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
