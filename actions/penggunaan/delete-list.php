<?php

$table = 'penggunaan';
$conn = conn();
$db   = new Database($conn);

$db->delete($table,[
    'tahun' => $_GET['tahun']
]);

set_flash_msg(['success'=>$table.' berhasil dihapus']);
header('location:'.routeTo('penggunaan/index'));
die();