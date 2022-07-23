<table class="table datatable">
    <thead>
        <tr>
            <th width="20px">#</th>
            <th>Invoice</th>
            <th>Pelanggan</th>
            <th>Total</th>
            <th>Tanggal</th>
            <th class="text-right">
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($datas as $index => $data): ?>
        <tr>
            <td>
                <?=$index+1?>
            </td>
            <td><a href="<?=routeTo('penjualan/index',['invoice'=>$data->invoice])?>"><?=$data->invoice?></a></td>
            <td><?=$data->pelanggan?></td>
            <td><?=number_format($data->inv_total)?></td>
            <td><?=$data->tanggal?></td>
            <td>
                <a href="<?=routeTo('penjualan/delete-list',['invoice'=>$data->invoice])?>" onclick="if(confirm('apakah anda yakin akan menghapus data ini ?')){return true}else{return false}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>