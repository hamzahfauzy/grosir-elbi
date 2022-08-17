<?php

$stok = $db->single('stok',[
    'produk_id' => $insert->produk_id
]);

$jumlah = $stok->jumlah + $insert->jumlah;

$db->update('stok',[
    'jumlah' => $jumlah,
],[
    'produk_id' => $insert->produk_id
]);