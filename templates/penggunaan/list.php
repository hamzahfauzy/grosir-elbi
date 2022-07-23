<table class="table datatable">
    <thead>
        <tr>
            <th width="20px">#</th>
            <th>Tahun</th>
            <th>Status</th>
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
            <td><a href="<?=routeTo('penggunaan/index',['tahun'=>$data->tahun])?>"><?=$data->tahun?></a></td>
            <td><?=$data->periode?'Aktif':'Tidak Aktif'?> - <a href="<?=routeTo('penggunaan/toggle',['tahun'=>$data->tahun])?>">Update</a></td>
            <td>
                <a href="<?=routeTo('penggunaan/delete-list',['tahun'=>$data->tahun])?>" onclick="if(confirm('apakah anda yakin akan menghapus data ini ?')){return true}else{return false}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>