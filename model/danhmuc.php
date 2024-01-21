<?php
function loadall_danhmuc()
{
    $sql = "SELECT * from danhmuc order by id desc";
    $listdanhmuc = pdo_query($sql);
    return  $listdanhmuc;
}
function add_danhmuc($idddm)
{
    $sql = "INSERT INTO danhmuc(name) values('$idddm')";
    pdo_execute($sql);
}
function delete_danhmuc($iddm)
{
    $sql = "DELETE from danhmuc where id =$iddm";
    pdo_execute($sql);
}
function update_danhmuc($id, $tenloai)
{
    $sql = "UPDATE danhmuc SET name='" . $tenloai . "' where id= " . $id;
    pdo_execute($sql);
}
function load_ten_dm($iddm)
{
    if ($iddm > 0 ) {
        $sql = "SELECT * from danhmuc where id=" . $iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $dm;
    } else {
         return "";
        
    }
}
