<?php

return [
    'title'            => [
        'name'         => '標題',
        'instructions' => '請問這頁面的標題是什麼？'
    ],
    'slug'             => [
        'name'         => '縮略(slug)',
        'instructions' => '此 縮略名(slug) 將會用在這頁面的網址上。'
    ],
    'meta_title'       => [
        'name'         => 'Meta 標題',
        'instructions' => '請輸入這頁面的 SEO 標題。 如果沒有填寫，則預設為該頁面的標題。'
    ],
    'meta_description' => [
        'name'         => 'Meta 說明',
        'instructions' => '請輸入這頁面的 SEO 說明。'
    ],
    'meta_keywords'    => [
        'name'         => 'Meta 關鍵字',
        'instructions' => '請輸入這頁面的 SEO 關鍵字。'
    ],
    'css'              => [
        'name'         => 'CSS',
        'instructions' => '這些 CSS 將會加入到 <strong>styles.css</strong> asset collection 當中。'
    ],
    'js'               => [
        'name'         => 'JS',
        'instructions' => '這些 script 將會加入到 <strong>scripts.js</strong> asset collection 當中。'
    ],
    'name'             => [
        'name'         => '名稱',
        'instructions' => '請問這頁面的 型別(page type) 名稱是什麼？'
    ],
    'description'      => [
        'name'         => '說明',
        'instructions' => '請簡述這個 頁面型別(page type)。'
    ],
    'theme_layout'     => [
        'name'         => '模板佈局',
        'instructions' => '這個 模板佈局(theme layout) 將會被用於 包裝(wrap) 頁面的內容。'
    ],
    'layout'           => [
        'name'         => '佈局',
        'instructions' => '這個 佈局(layout) 將會被用來顯示頁面的內容。'
    ],
    'allowed_roles'    => [
        'name'         => '允許操作的角色',
        'instructions' => '什麼使用者角色可以瀏覽此頁面？'
    ],
    'visible'          => [
        'name'         => '顯示',
        'label'        => '可否在導覽列中顯示？',
        'instructions' => '設定禁用將在程式生成的導覽列中隱藏。'
    ],
    'exact'            => [
        'name'         => '相同的 URI',
        'label'        => 'URI 是否必須完全相同？',
        'instructions' => '如果設定關閉，代表允許 有其他參數附加時 也可以到達此頁面。'
    ],
    'enabled'          => [
        'name'         => '啟用',
        'label'        => '啟用這個頁面嗎？',
        'instructions' => '如果設定禁用，這個頁面將會有個安全網址，讓您仍可與其他人分享。'
    ],
    'home'             => [
        'name'         => '首頁',
        'label'        => '請問這是網站首頁嗎？',
        'instructions' => '首頁是網站的預設到達頁面。'
    ],
    'parent'           => [
        'name'         => '父頁面',
        'instructions' => '如有需要，請指定上層頁面。'
    ],
    'page_handler'     => [
        'name'         => '頁面處理器',
        'instructions' => '頁面處理器將負責建立頁面的 HTTP 回應。'
    ]
];
