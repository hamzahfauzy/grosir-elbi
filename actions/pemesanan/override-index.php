<?php
$user = auth()->user;
if(get_role($user->id)->name == 'suplier')
{
    $suplier = $db->single('suplier',['user_id'=>$user->id]);
    $produk = $db->all('produk',['suplier_id'=>$suplier->id]);
    
    if($produk)
    {
        $produk = array_map(function($p){
            return $p->id;
        }, $produk);

        return $db->all('pemesanan',[
            'produk_id' => ['IN','('.implode($produk).')']
        ]);
    }

    return [];

}
else
{
    return $db->all('pemesanan');
}