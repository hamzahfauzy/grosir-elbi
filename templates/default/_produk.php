<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Data Produk</h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data produk</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive table-hover table-sales">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th width="20px">#</th>
                                            <?php 
                                            foreach($fields as $field): 
                                                $label = $field;
                                                if(is_array($field))
                                                {
                                                    $label = $field['label'];
                                                }
                                                $label = _ucwords($label);
                                            ?>
                                            <th><?=$label?></th>
                                            <?php endforeach ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($datas as $index => $data): ?>
                                        <tr>
                                            <td>
                                                <?=$index+1?>
                                            </td>
                                            <?php 
                                            foreach($fields as $key => $field): 
                                                $label = $field;
                                                if(is_array($field))
                                                {
                                                    $label = $field['label'];
                                                    $data_value = Form::getData($field['type'],$data->{$key},true);
                                                    if($field['type'] == 'number')
                                                    {
                                                        $data_value = number_format($data_value);
                                                    }
                                                    $field = $key;
                                                }
                                                else
                                                {
                                                    $data_value = $data->{$field};
                                                }
                                                $label = _ucwords($label);
                                            ?>
                                            <td><?=$data_value?></td>
                                            <?php endforeach ?>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>