<?php

$table = 'penjualan';
Page::set_title(ucwords($table));
$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');
$user = auth()->user;

if(isset($_GET['invoice']))
{
    $params = ['invoice'=>$_GET['invoice']];
    if(get_role($user->id)->id == 3)
    {
        $pelanggan = $db->single('pelanggan',['user_id' => $user->id]);
        $params['pelanggan'] = $pelanggan->nama;
    }
    $data = $db->all($table,$params);
    $data = array_map(function($d) use ($db){
        $d->produk = $db->single('produk',['id'=>$d->produk_id]);
        return $d;
    }, $data);
}
else
{
    if(get_role($user->id)->role_id == 3)
    {
        $pelanggan = $db->single('pelanggan',['user_id' => $user->id]);
        // $params['pelanggan'] = $pelanggan->nama;
        $db->query = "SELECT invoice, pelanggan, tanggal, (SELECT SUM(TOTAL) FROM $table b WHERE b.invoice = a.invoice AND b.pelanggan = a.pelanggan) as inv_total FROM $table a WHERE a.pelanggan = '$pelanggan->nama' GROUP BY invoice, pelanggan, tanggal";
    }
    else
    {
        $db->query = "SELECT invoice, pelanggan, tanggal, (SELECT SUM(TOTAL) FROM $table b WHERE b.invoice = a.invoice) as inv_total FROM $table a GROUP BY invoice, pelanggan, tanggal";
    }
    $data = $db->exec('all');
}

return [
    'datas' => $data,
    'table' => $table,
    'success_msg' => $success_msg
];