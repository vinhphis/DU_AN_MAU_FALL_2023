<?php
function loadall_sanpham_home()
{
    $sql = "SELECT * from sanpham where 1 order by id desc limit 0,9";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}
function loadall_sanpham_top10()
{
    $sql = "SELECT * from sanpham where 1 order by luotxem desc limit 0,10";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
// function loadall_sanpham($kyw = "", $iddm = 0)
function loadall_sanpham($kyw, $iddm)
{
    // kyw 1 tức là nó đúng
    $sql = "SELECT *,dm.name,sp.id from sanpham sp inner join danhmuc dm on sp.iddm=dm.id";
    // nếu $kyw khác rỗng thì nối chuỗi câu lệnh sql
    if ($kyw != "") {
        $sql .= " AND namesp like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " AND iddm ='" . $iddm . "' ";
    }
    $sql .= " ORDER by sp.id desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}



function loadone_sanpham($id)
{
    $sql = "SELECT *,dm.name,sp.id from sanpham sp inner join danhmuc dm on sp.iddm=dm.id where sp.id = $id";
    $result = pdo_query_one($sql);
    return $result;
}
function load_sanpham_cungloai($id, $iddm)
{
    $sql = "SELECT * from sanpham where iddm = $iddm and id <> $id LIMIT 0,3";
    $result = pdo_query($sql);
    return $result;
}
function add_sanpham($tensp, $gialoai, $image, $mota, $maloai)
{
    $sql = "INSERT INTO sanpham(namesp,price,img,mota,iddm) values('$tensp','$gialoai','$image','$mota','$maloai')";
    pdo_execute($sql);
}
function loadsall_sanpham()
{
    $sql = "SELECT * FROM sanpham order by id desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function delete_sanpham($idsp)
{
    $sql = "DELETE FROM sanpham where id= $idsp";
    pdo_query($sql);
}
function update_sanpham($id, $tensp, $gialoai, $hinh, $mota, $maloai)
{
    if ($hinh != "")
        $sql = "UPDATE sanpham SET namesp='" . $tensp . "',price='" . $gialoai . "',img='" . $hinh . "',mota='" . $mota . "',iddm='" . $maloai . "' where id=" . $id;
    else
        $sql = "UPDATE sanpham SET namesp='" . $tensp . "',price='" . $gialoai . "',mota='" . $mota . "',iddm='" . $maloai . "' where id=" . $id;
    pdo_execute($sql);
}
