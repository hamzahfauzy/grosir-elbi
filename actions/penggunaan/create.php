<?php

$table = 'penggunaan';
Page::set_title('Tambah '.ucwords($table));
$error_msg = get_flash_msg('error');
$old = get_flash_msg('old');

if(request() == 'POST')
{
    $conn = conn();
    $db   = new Database($conn);

    $tahun = $_POST['tahun'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];

    $db->query = "SELECT produk_id, (SELECT SUM(jumlah) FROM penjualan b WHERE b.produk_id = a.produk_id AND b.tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai') as JML FROM penjualan a WHERE a.tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' GROUP BY produk_id";
    $penjualan = $db->exec('all');

    foreach($penjualan as $p)
    {
        $db->insert($table,[
            'produk_id' => $p->produk_id,
            'jumlah' => $p->JML,
            'tahun'  => $tahun
        ]);
    }

    // $db->query = "INSERT INTO $table";

    set_flash_msg(['success'=>$table.' berhasil ditambahkan']);
    header('location:'.routeTo('penggunaan/index',['tahun'=>$tahun]));
}

return compact('table','error_msg','old');