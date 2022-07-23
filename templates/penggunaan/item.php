<table class="table datatable">
    <thead>
        <tr>
            <th width="20px">#</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <!-- <th class="text-right">
            </th> -->
        </tr>
    </thead>
    <tbody>
        <?php foreach($datas as $index => $data): ?>
        <tr>
            <td>
                <?=$index+1?>
            </td>
            <td><?=$data->produk->nama?></td>
            <td><?=number_format($data->jumlah)?></td>
            <!-- <td>
                <a href="<?=routeTo('penggunaan/edit',['id'=>$data->id])?>" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                <a href="<?=routeTo('penggunaan/delete',['id'=>$data->id])?>" onclick="if(confirm('apakah anda yakin akan menghapus data ini ?')){return true}else{return false}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
            </td> -->
        </tr>
        <?php endforeach ?>
    </tbody>
</table>