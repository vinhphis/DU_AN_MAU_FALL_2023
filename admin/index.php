<?php
include '../model/pdo.php';
include '../model/danhmuc.php';
include '../model/sanpham.php';
include "../model/binhluan.php";
include "../model/taikhoan.php";
include "../model/thongke.php";
include '../global.php';
include "header.php";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {

            // danh mục
        case "adddm":
            if (isset($_POST['tenloai']) && ($_POST['tenloai'] > 0)) {
                $adddm = $_POST['tenloai'];
                add_danhmuc($adddm);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/adddm.php";
            break;
        case "listdm":
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/listdm.php";
            break;
        case "xoadm":
            try {
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $iddm =  $_GET['id'];
                    delete_danhmuc($iddm);
                    $thongbao = "Xóa thành công";
                }
                // sau khi xóa thì hiện thị lại danh sách danh mục

            } catch (Exception $e) {
                echo "Không thể xóa danh mục này";
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/listdm.php";
            break;
        case "suadm":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                // hiện thị giá trị của san phẩm muốn update
                $dm = load_ten_dm($_GET['id']);
            }
            include 'danhmuc/update.php';
            break;
        case "updatedm":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'] > 0)) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($id, $tenloai);
                $thongbao = "Cập Nhật thành công";
            }

            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/listdm.php";
            break;


            // sản phẩm
        case "addsp":
            if (isset($_POST['tsp']) && ($_POST['tsp'] > 0)) {
                $target_dir = "../upload/";
                $target_file = $target_dir .  basename($_FILES['url_image']['name']);

                $maloai = $_POST['maloai'];
                $tensp = $_POST['tensp'];
                $gialoai = $_POST['gialoai'];
                $mota = $_POST['mota'];
                $image = $_FILES['url_image']['name'];
                if (move_uploaded_file($_FILES['url_image']['tmp_name'], $target_file)) {
                    echo "upload thành công";
                } else {
                    echo "upload thất bại";
                }
                add_sanpham($tensp, $gialoai, $image, $mota, $maloai);
                $thongbao = "Thêm thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/addsp.php";
            break;
        case "listsp":
            if (isset($_POST['locsp']) && ($_POST['locsp'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = "";
                $iddm = 0;
            }

            $listsanpham = loadall_sanpham($kyw, $iddm);
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/listsp.php";
            break;
        case "xoasp":
            try {
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $idsp = $_GET['id'];
                    delete_sanpham($idsp);
                    $thongbao = "Xóa thành công";
                }
                // sau khi xóa thì hiện thị lại danh sách sản phẩm
            } catch (Exception $e) {
                echo "Không thể xóa sản phẩm này";
            }
            $listsanpham = loadsall_sanpham();
            include "sanpham/listsp.php";
            break;
        case "suasp":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $listsanpham = loadone_sanpham($_GET['id']);
                $new_id = $_GET['id'];
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/update.php";
            break;
        case "updatesp":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_GET['id'];
                $target_dir = "../upload/";
                $target_file = $target_dir .  basename($_FILES['hinh']['name']);
                $maloai = $_POST['maloai'];
                $tensp = $_POST['tensp'];
                $gialoai = $_POST['gialoai'];
                $mota = $_POST['mota'];

                $image = $_FILES['hinh']['name'];
                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                } else {
                }
                update_sanpham($id, $tensp, $gialoai, $image, $mota, $maloai);
                $thongbao = "Cập Nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadsall_sanpham();
            include "sanpham/listsp.php";
            break;

            // bình luận
        case "binhluan":
            $listbinhluan = loadsall_coment();
            include 'binhluan/listbl.php';
            break;
        case "xoabinhluan":
            if (isset($_GET['id'])) {
                delete_binhluan($_GET['id']);
                $thongbao = "Xóa thành công";
            }
            $listbinhluan = loadsall_coment();
            include 'binhluan/listbl.php';
            break;

            // khách hàng
        case "khachhang":
            $listkhachhang = loadsall_taikhoan();
            include 'khachhang/listkhachhang.php';
            break;

        case "listthongke":
            $listthongke = loadall_thongke();

            include "thongke/listthongke.php";
            break;
        case "bieudo":
            $thongke = loadall_thongke();

            include "thongke/bieudo.php";
            break;

        default:
            include "home.php";
    }
} else {
    include "home.php";
}
include "footer.php";
