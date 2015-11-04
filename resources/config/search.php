<?php

return [
    \Anomaly\PagesModule\Page\PageModel::class => [
        'title'       => 'title',
        'keywords'    => 'meta_keywords',
        'description' => 'meta_description',
        'enabled'     => 'enabled',
        'collection'  => 'pages',
        'view_path'   => 'entry.path',
        'edit_path'   => 'admin/pages/edit/{entry.id}'
    ]
];
