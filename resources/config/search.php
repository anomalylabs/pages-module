<?php

return [
    \Anomaly\PagesModule\Page\PageModel::class => [
        'title'       => 'title',
        'keywords'    => 'meta_keywords',
        'description' => 'meta_description',
        'enabled'     => 'enabled',
        'view'        => 'entry.path',
        'edit'        => 'admin/pages/edit/{entry.id}',
        'fields'      => [
            'path' => 'path'
        ]
    ]
];
