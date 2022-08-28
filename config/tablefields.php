<?php

return [
    'kategori'    => [
        'nama'
    ],
    'satuan'    => [
        'nama'
    ],
    'suplier' => [
        'nama','alamat','no_hp'
    ],
    'pelanggan' => [
        'nama','alamat','no_hp'
    ],
    'produk' => [
        'nama',
        'suplier_id' => [
            'label' => 'Suplier',
            'type'  => 'options-obj:suplier,id,nama'
        ],
        'kategori' => [
            'label' => 'Kategori',
            'type'  => 'options-obj:kategori,nama,nama'
        ],
        'satuan' => [
            'label' => 'Satuan',
            'type'  => 'options-obj:satuan,nama,nama'
        ],
        'biaya_pemesanan' => [
            'label' => 'Biaya Pemesanan',
            'type'  => 'number'
        ],
        'biaya_penyimpanan' => [
            'label' => 'Biaya Penyimpanan',
            'type'  => 'number'
        ],
        'harga' => [
            'label' => 'Harga Eceran',
            'type'  => 'number'
        ],
        'jumlah_per_satuan' => [
            'label' => 'Jumlah Per Satuan',
            'type'  => 'number'
        ]
    ],
    'stok' => [
        'produk_id' => [
            'label' => 'Produk',
            'type'  => 'options-obj:produk,id,nama'
        ],
        'jumlah' => [
            'label' => 'Jumlah',
            'type'  => 'number'
        ]
    ],
    'penjualan' => [
        'produk_id' => [
            'label' => 'Produk',
            'type'  => 'options-obj:produk,id,nama'
        ],
        'pelanggan' => [
            'label' => 'Pelanggan',
            'type'  => 'options-obj:pelanggan,nama,nama'
        ],
        'jumlah' => [
            'label' => 'Jumlah',
            'type'  => 'number'
        ],
        // total, tanggal, invoice
    ],
    'pemesanan' => [
        'produk_id' => [
            'label' => 'Produk',
            'type'  => 'options-obj:produk,id,nama'
        ],
        'jumlah' => [
            'label' => 'Jumlah',
            'type'  => 'number'
        ],
        'status' => [
            'label' => 'Status',
            'type'  => 'options:Menunggu|Proses|Batal|Selesai'
        ],
        'tanggal' => [
            'label' => 'Tanggal',
            'type'  => 'datetime-local'
        ]
    ],
    'penggunaan' => [
        'produk_id' => [
            'label' => 'Produk',
            'type'  => 'options-obj:produk,id,nama'
        ],
        'tahun' => [
            'label' => 'Tahun',
            'type'  => 'number'
        ],
        'jumlah' => [
            'label' => 'Jumlah',
            'type'  => 'number'
        ],
    ]
];