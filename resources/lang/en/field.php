<?php

return [
    'title'            => [
        'name'         => 'Title',
        'instructions' => 'What is the title of the page?'
    ],
    'slug'             => [
        'name'         => 'Slug',
        'instructions' => 'The slug is used in building the page\'s URL.'
    ],
    'meta_title'       => [
        'name'         => 'Meta Title',
        'instructions' => 'Enter the page\'s SEO title. The page\'s title will be used by default.'
    ],
    'meta_description' => [
        'name'         => 'Meta Description',
        'instructions' => 'Enter the page\'s SEO description.'
    ],
    'meta_keywords'    => [
        'name'         => 'Meta Keywords',
        'instructions' => 'Enter the page\'s SEO keywords. Use ONLY as many as makes sense.'
    ],
    'css'              => [
        'name'         => 'CSS',
        'instructions' => 'This CSS will be added to the <strong>styles.css</strong> asset collection.'
    ],
    'js'               => [
        'name'         => 'JS',
        'instructions' => 'This script will be added to the <strong>scripts.js</strong> asset collection.'
    ],
    'name'             => [
        'name'         => 'Name',
        'instructions' => 'What is the name of this page type?'
    ],
    'description'      => [
        'name'         => 'Description',
        'instructions' => 'Briefly describe the page type.'
    ],
    'theme_layout'     => [
        'name'         => 'Theme Layout',
        'instructions' => 'The theme layout will be used to wrap the page content.'
    ],
    'layout'           => [
        'name'         => 'Layout',
        'instructions' => 'The layout will be used to display the page content.'
    ],
    'allowed_roles'    => [
        'name'         => 'Allowed Roles',
        'instructions' => 'Which user roles are allowed to view this page?'
    ],
    'hidden'           => [
        'name'         => 'Hidden',
        'label'        => 'Hide this page from navigation?',
        'instructions' => 'Hidden pages will not display in navigation built with pages.'
    ],
    'exact'            => [
        'name'         => 'Exact URI',
        'label'        => 'Require an exact URI match?',
        'instructions' => 'Disable to allow parameters following the URI for this page.'
    ],
    'enabled'          => [
        'name'         => 'Enabled',
        'label'        => 'Is this page enabled?',
        'instructions' => 'If disabled, this page will have a secure URL you can share with others.'
    ],
    'home'             => [
        'name'         => 'Home Page',
        'label'        => 'Is this the home page?',
        'instructions' => 'The home page is the default landing page.'
    ],
    'parent'           => [
        'name'         => 'Parent',
        'instructions' => 'Choose the parent page if any.'
    ],
    'page_handler'     => [
        'name'         => 'Page Handler',
        'instructions' => 'The page handler is responsible for building the HTTP response for a page.'
    ]
];
