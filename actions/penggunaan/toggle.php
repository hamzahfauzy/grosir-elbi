<?php

$conn = conn();
$db   = new Database($conn);

$exists = false;
$periode = $db->single('periode',['tahun'=>$_GET['tahun']]);
if($periode)
{
    $exists = true;
}

$db->delete('periode',[1=>1]);

if(!$exists)
{
    $db->insert('periode',['tahun'=>$_GET['tahun']]);
}

set_flash_msg(['success'=>'Periode berhasil diupdate']);
header('location:'.routeTo('penggunaan/index'));