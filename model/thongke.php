<?php
function loadall_thongke()
{
    $sql = "SELECT dm.id,name,max(sp.price) as maxprice, min(sp.price) as minprice, count(sp.iddm) as countsp from danhmuc dm
    left join sanpham sp on  dm.id = sp.iddm 
    GROUP by id 
    order by  countsp desc";
    $thongke = pdo_query($sql);
    return $thongke;
}

