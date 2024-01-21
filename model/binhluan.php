<?php
function loadall_binhluan($idsp)
{
    $sql = "
            SELECT binhluan.idbl, binhluan.noidung, taikhoan.user, binhluan.ngaybinhluan FROM `binhluan` 
            LEFT JOIN taikhoan ON binhluan.iduser = taikhoan.iduser
            LEFT JOIN sanpham ON binhluan.idpro = sanpham.id
            WHERE sanpham.id = $idsp;
        ";
    $result =  pdo_query($sql);
    return $result;
}
function insert_binhluan($idpro, $noidung)
{
    $date = date('Y-m-d');
    $iduser = $_SESSION['user']['iduser'];
    $sql = "INSERT INTO binhluan(noidung,iduser,idpro,ngaybinhluan) 
            VALUES ('$noidung','$iduser','$idpro','$date');
        ";
    pdo_execute($sql);
}
function loadsall_coment()
{
    $sql = "SELECT binhluan.idbl, binhluan.noidung, taikhoan.user, taikhoan.iduser ,binhluan.ngaybinhluan, sanpham.id FROM `binhluan` 
        left JOIN taikhoan ON binhluan.iduser = taikhoan.iduser
        left JOIN sanpham ON binhluan.idpro = sanpham.id
        order by binhluan.idbl desc";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
function delete_binhluan($iddm)
{
    $sql = "DELETE from binhluan where idbl =$iddm";
    pdo_execute($sql);
}
function loadall_binhluan_user($idser)
{
    $sql = "SELECT sanpham.img,sanpham.id,binhluan.noidung, binhluan.ngaybinhluan,binhluan.idbl FROM binhluan
    LEFT JOIN sanpham on binhluan.idpro= sanpham.id
    where binhluan.iduser =  $idser order by idbl desc";
    $binhluan = pdo_query($sql);
    return $binhluan;
}
