<?php

$table = 'penggunaan';
Page::set_title('Edit '.ucwords($table));
$conn = conn();
$db   = new Database($conn);
$error_msg = get_flash_msg('error');
$old = get_flash_msg('old');

$data = $db->single($table,[
    'id' => $_GET['id']
]);

$tahun = $data->tahun;

if(request() == 'POST')
{

    $produk = $db->single('produk',[
        'id' => $_POST[$table]['produk_id']
    ]);

    $edit = $db->update($table,$_POST[$table],[
        'id' => $_GET['id']
    ]);

    set_flash_msg(['success'=>$table.' berhasil diupdate']);
    header('location:'.routeTo('penggunaan/index',['tahun'=>$tahun]));
}

return [
    'data' => $data,
    'error_msg' => $error_msg,
    'old' => $old,
    'table' => $table
];