<?php

if(!isset($_GET['invoice']))
{
    $invoice = 'INV-'.strtotime('now');
    header('location:'.routeTo('penjualan/create',['invoice'=>$invoice]));
    die();
}

$invoice = $_GET['invoice'];

$table = 'penjualan';
Page::set_title('Tambah '.ucwords($table));
$error_msg = get_flash_msg('error');
$old = get_flash_msg('old');

if(request() == 'POST')
{
    $conn = conn();
    $db   = new Database($conn);

    $produk = $db->single('produk',[
        'id' => $_POST[$table]['produk_id']
    ]);

    if(get_role(auth()->user->id)->role_id == 3)
    {
        $pelanggan = $db->single('pelanggan',[
            'user_id' => auth()->user->id
        ]);
        $_POST[$table]['pelanggan'] = $pelanggan->nama;
    }

    $_POST[$table]['invoice'] = $invoice;
    $_POST[$table]['total']   = $_POST[$table]['jumlah']*$produk->harga;
    $time = str_replace('INV-','',$invoice);
    $_POST[$table]['tanggal'] = date('Y-m-d H:i:s', $time);
    $insert = $db->insert($table,$_POST[$table]);

    $db->update($table,[
        'pelanggan' => $_POST[$table]['pelanggan']
    ],[
        'invoice' => $invoice
    ]);

    $stok = $db->single('stok',[
        'produk_id' => $_POST[$table]['produk_id']
    ]);

    $db->update('stok',[
        'jumlah' => $stok->jumlah - $_POST[$table]['jumlah']
    ],[
        'produk_id' => $_POST[$table]['produk_id']
    ]);

    set_flash_msg(['success'=>$table.' berhasil ditambahkan']);
    header('location:'.routeTo('penjualan/index',['invoice'=>$invoice]));
}

return compact('table','error_msg','old');