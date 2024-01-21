<?php
function add_donhang($namepro, $url_image, $price, $soluong, $sum_price, $idsp, $iduser)
{
    $date = date('d-m-Y H:i:s');
    $sql = "INSERT INTO donhang(namepro,url_image,price,soluong,sum_price,idsp,iduser,status,ngaymuahang) 
    values('$namepro','$url_image','$price','$soluong','$sum_price','$idsp','$iduser','0','$date')";
    pdo_execute($sql);
}
function load_donhang($iduser)
{
    $sql = "SELECT * FROM donhang where iduser='" . $iduser . "' and status= '0' order by iddh desc ";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
}
function delete_donhang($iddh)
{
    $sql = "DELETE  FROM donhang where iddh = " . $iddh;
    pdo_execute($sql);
}

function load_thanhtoan($iddh)
{
    $sql = "SELECT * FROM donhang where iddh in ($iddh)";
    $donhang = pdo_query($sql);
    return $donhang;
}
function add_thanhtoan($iddh,$soluong)
{

    $sql = "UPDATE donhang set soluong = ($soluong) where iddh in ($iddh)";
    $donhang = pdo_execute($sql);
    return $donhang;
}
function add_billsp($iddh)
{
    $date = date('d-m-Y H:i:s');
    $sql = "UPDATE donhang set status='1',ngaymuahang='$date' where iddh in ($iddh)";
    $donhang = pdo_execute($sql);
    return $donhang;
}
function load_billsp($iduser)
{
    $sql = "SELECT * FROM donhang where iduser='" . $iduser . "' and status in (1,2)  order by iddh desc ";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
}
function delete_billsp($iddh)
{

    $sql = "UPDATE donhang set status='2' where iddh in ($iddh)";
    $donhang = pdo_execute($sql);
    return $donhang;
}
