<?php

// Header menu
return [

    'items' => [
        [
            'title'   => 'Üretim',
            'root'    => true,
            'toggle'  => 'click',
            'can'     => 'uretim-menusu',
            'submenu' => [
                'type'      => 'classic',
                'alignment' => 'left',
                'items'     => [
                    [
                        'title'       => 'Emirler',
                        'page'        => 'production',
                        'can'         => 'uretim-emirleri',
                        'whereActive' => [
                            [
                                'segment' => 1,
                                'value'   => 'user',
                            ],
                            [
                                'segment' => 2,
                                'value'   => 'production',
                            ],
                        ],
                        'whereNotActive' => [
                            [
                                'segment' => 3,
                                'value'   => 'paper',
                            ],
                            [
                                'segment' => 3,
                                'value'   => 'laminoks',
                            ],
                            [
                                'segment' => 3,
                                'value'   => 'list',
                            ],
                            [
                                'segment' => 4,
                                'value'   => 'laminant',
                            ],
                        ],
                    ],
                    [
                        'title'   => 'Listeler',
                        'can'     => 'listeler-menusu',
                        'submenu' => [
                            [
                                'title'       => 'Üretim Listeleri',
                                'page'        => 'production/list',
                                'can'         => 'uretim-listeleri',
                                'whereActive' => [
                                    [
                                        'segment' => 1,
                                        'value'   => 'user',
                                    ],
                                    [
                                        'segment' => 2,
                                        'value'   => 'production',
                                    ],
                                    [
                                        'segment' => 3,
                                        'value'   => 'list',
                                    ],
                                ],
                            ],
                            [
                                'title' => 'Üretim Listeleri (Listesiz)',
                                'page'  => 'production/list/without-listing',
                                'can'   => 'listesiz-emirler',
                            ],
                        ],
                    ],
                    [
                        'title'   => 'Laminoks',
                        'can'     => 'listeler-menusu',
                        'submenu' => [
                            [
                                'title' => 'Laminoks',
                                'page'  => 'production/laminoks',
                                'can'   => 'laminoks',
                            ],
                            [
                                'title'       => 'Kağıt Kesim',
                                'page'        => 'production/paper',
                                'can'         => 'kagit-kesim',
                                'whereActive' => [
                                    [
                                        'segment' => 1,
                                        'value'   => 'user',
                                    ],
                                    [
                                        'segment' => 3,
                                        'value'   => 'paper',
                                    ],
                                ],
                            ],
                            [
                                'title' => 'Laminoks MDF',
                                'page'  => 'production/mdf',
                                'can'   => 'laminoks',
                            ],
                            [
                                'title' => 'Günlük Rapor',
                                'page'  => 'production/daily',
                                'can'   => 'laminoks',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title'   => 'Muhasebe',
            'can'     => 'muhasebe-menusu',
            'root'    => true,
            'toggle'  => 'click',
            'submenu' => [
                'type'      => 'classic',
                'alignment' => 'left',
                'items'     => [
                    [
                        'title'       => 'Cari Hesaplar',
                        'page'        => 'company',
                        'can'         => 'cari-hesaplar',
                        'whereActive' => [
                            [
                                'segment' => 1,
                                'value'   => 'user',
                            ],
                            [
                                'segment' => 2,
                                'value'   => 'company',
                            ],
                        ],
                    ],
                    [
                        'title'   => 'Kasa',
                        'can'     => 'kasa-hareketleri',
                        'submenu' => [
                            [
                                'title'       => 'Kasalar',
                                'page'        => 'cashbox',
                                'can'         => 'kasa-hareketleri',
                                'whereActive' => [
                                    [
                                        'segment' => 1,
                                        'value'   => 'cashbox',
                                    ],
                                ],
                                'whereNotActive' => [
                                    [
                                        'segment' => 2,
                                        'value'   => 'activity',
                                    ],
                                ],
                            ],
                            [
                                'title'       => 'Kasa Hareketleri',
                                'page'        => 'cashbox/activity',
                                'can'         => 'kasa-hareketleri',
                                'whereActive' => [
                                    [
                                        'segment' => 1,
                                        'value'   => 'cashbox',
                                    ],
                                    [
                                        'segment' => 2,
                                        'value'   => 'activity',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title'       => 'Fişler',
                        'can'         => 'fisler',
                        'whereActive' => [
                            [
                                'segment' => 1,
                                'value'   => 'fiche',
                            ],
                        ],
                        'submenu' => [
                            'type'      => 'classic',
                            'alignment' => 'left',
                            'items'     => [
                                [
                                    'title'       => 'Satışlar',
                                    'page'        => 'fiche/sale',
                                    'can'         => 'fisler',
                                    'whereActive' => [
                                        [
                                            'segment' => 1,
                                            'value'   => 'fiche',
                                        ],
                                        [
                                            'segment' => 2,
                                            'value'   => 'sale',
                                        ],
                                    ],
                                ],
                                [
                                    'title'       => 'Satınalmalar',
                                    'page'        => 'fiche/purchase',
                                    'can'         => 'fisler',
                                    'whereActive' => [
                                        [
                                            'segment' => 1,
                                            'value'   => 'fiche',
                                        ],
                                        [
                                            'segment' => 2,
                                            'value'   => 'purchase',
                                        ],
                                    ],
                                ],
                                [
                                    'title'       => 'Aktarım',
                                    'page'        => 'transfer',
                                    'can'         => 'logoya-fis-aktarimi',
                                    'whereActive' => [
                                        [
                                            'segment' => 1,
                                            'value'   => 'transfer',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title'       => 'Stoklar',
                        'page'        => 'stock',
                        'can'         => 'stoklar',
                        'whereActive' => [
                            [
                                'segment' => 1,
                                'value'   => 'stock',
                            ],
                        ],
                    ],
                    [
                        'title'       => 'Birimler',
                        'page'        => 'unit',
                        'can'         => 'birimler',
                        'whereActive' => [
                            [
                                'segment' => 1,
                                'value'   => 'unit',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title'       => 'Medya',
            'root'        => true,
            'can'         => 'medya',
            'page'        => 'medya',
            'whereActive' => [
                [
                    'segment' => 1,
                    'value'   => 'user',
                ],
                [
                    'segment' => 2,
                    'value'   => 'medya',
                ],
            ],
        ],
        [
            'title'   => 'Sistem',
            'can'     => 'sistem-menusu',
            'root'    => true,
            'toggle'  => 'click',
            'submenu' => [
                'type'      => 'classic',
                'alignment' => 'left',
                'items'     => [
                    [
                        'title'       => 'Aktiviteler',
                        'root'        => true,
                        'can'         => 'aktiviteler',
                        'page'        => 'system/activity',
                        'whereActive' => [
                            [
                                'segment' => 1,
                                'value'   => 'user',
                            ],
                            [
                                'segment' => 2,
                                'value'   => 'system',
                            ],
                            [
                                'segment' => 3,
                                'value'   => 'activity',
                            ],
                        ],
                    ],
                    [
                        'title'       => 'Kullanıcılar',
                        'page'        => 'user/system/user',
                        'can'         => 'kullanicilar',
                        'whereActive' => [
                            [
                                'segment' => 1,
                                'value'   => 'user',
                            ],
                            [
                                'segment' => 2,
                                'value'   => 'system',
                            ],
                            [
                                'segment' => 3,
                                'value'   => 'user',
                            ],
                        ],
                    ],
                    [
                        'title'       => 'İzinler',
                        'page'        => 'system/permission',
                        'can'         => 'izinler',
                        'whereActive' => [
                            [
                                'segment' => 1,
                                'value'   => 'user',
                            ],
                            [
                                'segment' => 2,
                                'value'   => 'system',
                            ],
                            [
                                'segment' => 3,
                                'value'   => 'permission',
                            ],
                        ],
                    ],
                    [
                        'title'       => 'Müşteriler',
                        'page'        => 'system/customer',
                        'can'         => 'izinler',
                        'whereActive' => [
                            [
                                'segment' => 1,
                                'value'   => 'user',
                            ],
                            [
                                'segment' => 2,
                                'value'   => 'system',
                            ],
                            [
                                'segment' => 3,
                                'value'   => 'customer',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title'       => 'Raporlar',
            'root'        => true,
            'can'         => 'raporlamalar',
            'page'        => 'report',
            'whereActive' => [
                [
                    'segment' => 1,
                    'value'   => 'user',
                ],
                [
                    'segment' => 2,
                    'value'   => 'report',
                ],
            ],
        ],

    ],

];
