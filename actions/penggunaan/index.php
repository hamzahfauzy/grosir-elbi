<?php

$table = 'penggunaan';
Page::set_title(ucwords($table));
$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

if(isset($_GET['tahun']))
{
    $data = $db->all($table,['tahun'=>$_GET['tahun']]);
    $data = array_map(function($d) use ($db){
        $d->produk = $db->single('produk',['id'=>$d->produk_id]);
        $d->periode = $db->single('periode',['tahun'=>$d->tahun]);
        return $d;
    }, $data);
}
else
{
    $db->query = "SELECT tahun FROM $table GROUP BY tahun";
    $data = $db->exec('all');

    $data = array_map(function($d) use ($db){
        $d->periode = $db->single('periode',['tahun'=>$d->tahun]);
        return $d;
    }, $data);
}

return [
    'datas' => $data,
    'table' => $table,
    'success_msg' => $success_msg
];