<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Pembelian</h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data Pembelian</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <?php if(!isset($_GET['invoice'])): ?>
                        <a href="<?=routeTo('penjualan/create')?>" class="btn btn-secondary btn-round">Buat Pembelian</a>
                        <?php else: ?>
                        <a href="<?=routeTo('penjualan/create',['invoice'=>$_GET['invoice']])?>" class="btn btn-secondary btn-round">Tambah Item</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if($success_msg): ?>
                            <div class="alert alert-success"><?=$success_msg?></div>
                            <?php endif ?>
                            <div class="table-responsive table-hover table-sales">
                                <?php if(!isset($_GET['invoice'])): ?>
                                <?php load_templates('penjualan/list',compact('datas')) ?>
                                <?php else: ?>
                                <?php load_templates('penjualan/item',compact('datas')) ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>