<?php

$table = 'penjualan';
Page::set_title('Edit '.ucwords($table));
$conn = conn();
$db   = new Database($conn);
$error_msg = get_flash_msg('error');
$old = get_flash_msg('old');

$data = $db->single($table,[
    'id' => $_GET['id']
]);

$invoice = $data->invoice;

if(request() == 'POST')
{

    $produk = $db->single('produk',[
        'id' => $_POST[$table]['produk_id']
    ]);

    $_POST[$table]['invoice'] = $invoice;
    $_POST[$table]['total']   = $_POST[$table]['jumlah']*$produk->harga;
    $time = str_replace('INV-','',$invoice);
    $_POST[$table]['tanggal'] = date('Y-m-d H:i:s', $time);

    $edit = $db->update($table,$_POST[$table],[
        'id' => $_GET['id']
    ]);

    $db->update($table,[
        'pelanggan' => $_POST[$table]['pelanggan']
    ],[
        'invoice' => $invoice
    ]);

    set_flash_msg(['success'=>$table.' berhasil diupdate']);
    header('location:'.routeTo('penjualan/index',['invoice'=>$invoice]));
}

return [
    'data' => $data,
    'error_msg' => $error_msg,
    'old' => $old,
    'table' => $table
];