<?php

$user = auth()->user;

if(get_role($user->id)->name == 'suplier')
{
    $suplier = $db->single('suplier',['user_id'=>$user->id]);
    $data = $db->all('produk',['suplier_id'=>$suplier->id]);
}
return $data;