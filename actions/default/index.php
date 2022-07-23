<?php

Page::set_title('Dashboard');

$conn = conn();
$db   = new Database($conn);

$periode = $db->single('periode');
if($periode)
{
    $data = $db->all('penggunaan',['tahun'=>$periode->tahun]);
    $datas = array_map(function($d) use ($db){
        $d->produk = $db->single('produk',['id'=>$d->produk_id]);
        $d->periode = $db->single('periode',['tahun'=>$d->tahun]);
        $d->jumlah = ceil($d->jumlah/$d->produk->jumlah_per_satuan);

        $D = $d->jumlah;
        $S = $d->produk->biaya_pemesanan;
        $H = $d->produk->biaya_penyimpanan;
        $eoq = sqrt( (2*$D*$S) / $H);
        $d->eoq = $eoq;
        $d->interval_pemesanan = $D/$eoq;
        $d->jarak = $d->interval_pemesanan == 0 ? 0 : 365/$d->interval_pemesanan;
        return $d;
    }, $data);
    return compact('datas');
}