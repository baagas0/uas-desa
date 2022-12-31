<?php

return [
    [
        'type'  => 'item',
        'icon'  => 'icon-Car-Wheel',
        'title' => 'Dashboard',
        'url'   => '/home',
        'childrens' => []
    ],
    [
        'type'  => 'label',
        'title' => 'Master Data',
        'permission' => [1,7],
    ],
    [
        'type'  => 'item',
        'icon'  => 'icon-Administrator',
        'title' => 'Pengguna',
        'url'   => '/users',
        'permission' => [1,7],
        'childrens' => []
    ],
    [
        'type'  => 'item',
        'icon'  => 'icon-User',
        'title' => 'Karyawan',
        'url'   => '/employees',
        'permission' => [1,7],
        'childrens' => []
    ],
    
    [
        'type'  => 'label',
        'title' => 'Extra'
    ],
    [
        'type'  => 'item',
        'icon'  => 'icon-User',
        'title' => 'Kategori Berita',
        'url'   => '/news-category',
        'permission' => [],
        'childrens' => []
    ],
    [
        'type'  => 'item',
        'icon'  => 'sl-icon-book-open',
        'title' => 'Berita',
        'url'   => '/news',
        'permission' => [],
        'childrens' => []
    ],
    [
        'type'  => 'item',
        'icon'  => 'sl-icon-camrecorder',
        'title' => 'Vidio',
        'url'   => '/vidio-activity',
        'permission' => [],
        'childrens' => []
    ],
    [
        'type'  => 'item',
        'icon'  => 'sl-icon-info',
        'title' => 'Pengaduan',
        'url'   => '/complaint',
        'permission' => [],
        'childrens' => []
    ],
    [
        'type'  => 'item',
        'icon'  => 'sl-icon-bubbles',
        'title' => 'Komentar',
        'url'   => '/comment',
        'permission' => [],
        'childrens' => []
    ],
    [
        'type'  => 'item',
        'icon'  => 'sl-icon-picture',
        'title' => 'Galleri',
        'url'   => '/gallery',
        'permission' => [],
        'childrens' => []
    ],
];
