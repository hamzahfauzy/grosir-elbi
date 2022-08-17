<?php
$user = auth()->user;

if(get_role($user->id)->name == 'kustomer')
{
    require '_produk.php';
}
else
{
    require '_eoq.php';
}