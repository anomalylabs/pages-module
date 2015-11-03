<?php

return [
    \Anomaly\PagesModule\Page\PageModel::class => [
        'title'       => 'title',
        'keywords'    => 'meta_keywords',
        'description' => 'meta_description',
        'enabled'     => 'enabled',
        'view_path'   => 'entry.path',
        'edit_path'   => 'admin/pages/edit/{entry.id}',
        'fields'      => [
            'path' => 'path'
        ]
    ]
];
