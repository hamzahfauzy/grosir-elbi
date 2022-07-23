<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                        <h5 class="text-white op-7 mb-2">PENGENDALIAN PERSEDIAAN BARANG DAGANGAN PADA GROSIR ELBI RAMADHANI</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="<?=routeTo('crud/index',['table'=>'produk'])?>" class="btn btn-white btn-border btn-round mr-2">Produk</a>
                        <a href="<?=routeTo('crud/index',['table'=>'pelanggan'])?>" class="btn btn-secondary btn-round">Pelanggan</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Hasil EOQ</div>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
                                        <span class="btn-label">
                                            <i class="fa fa-pencil"></i>
                                        </span>
                                        Export
                                    </a>
                                    <a href="#" class="btn btn-info btn-border btn-round btn-sm">
                                        <span class="btn-label">
                                            <i class="fa fa-print"></i>
                                        </span>
                                        Print
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if(isset($datas)): ?>
                                <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th width="20px">#</th>
                                        <th>Produk</th>
                                        <th>Biaya Pemesanan</th>
                                        <th>Biaya Penyimpanan</th>
                                        <th>Jumlah</th>
                                        <th>EOQ</th>
                                        <th>Interval Pemesanan</th>
                                        <th>Jarak Interval</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($datas as $index => $data): ?>
                                    <tr>
                                        <td>
                                            <?=$index+1?>
                                        </td>
                                        <td><?=$data->produk->nama?></td>
                                        <td><?=number_format($data->produk->biaya_pemesanan)?></td>
                                        <td><?=number_format($data->produk->biaya_penyimpanan)?></td>
                                        <td><?=number_format($data->jumlah)?></td>
                                        <td><?=number_format($data->eoq)?></td>
                                        <td><?=number_format($data->interval_pemesanan)?> X Pemesanan / Tahun</td>
                                        <td><?=number_format($data->jarak)?> Hari</td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <?php else: ?>
                                <i>Tidak ada data</i>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>