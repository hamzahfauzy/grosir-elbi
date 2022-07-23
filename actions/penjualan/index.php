<?php

$table = 'penjualan';
Page::set_title(ucwords($table));
$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

if(isset($_GET['invoice']))
{
    $data = $db->all($table,['invoice'=>$_GET['invoice']]);
    $data = array_map(function($d) use ($db){
        $d->produk = $db->single('produk',['id'=>$d->produk_id]);
        return $d;
    }, $data);
}
else
{
    $db->query = "SELECT invoice, pelanggan, tanggal, (SELECT SUM(TOTAL) FROM $table b WHERE b.invoice = a.invoice) as inv_total FROM $table a GROUP BY invoice, pelanggan, tanggal";
    $data = $db->exec('all');
}

return [
    'datas' => $data,
    'table' => $table,
    'success_msg' => $success_msg
];