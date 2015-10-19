<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModulePagesCreatePagesStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModulePagesCreatePagesStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'pages',
        'title_column' => 'title',
        'translatable' => true
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'str_id'           => [
            'required' => true
        ],
        'title'            => [
            'translatable' => true,
            'required'     => true
        ],
        'slug',
        'type'             => [
            'required' => true
        ],
        'ttl',
        'entry',
        'parent',
        'hidden',
        'enabled',
        'exact',
        'home',
        'status',
        'meta_title'       => [
            'translatable' => true
        ],
        'meta_description' => [
            'translatable' => true
        ],
        'meta_keywords'    => [
            'translatable' => true
        ],
        'theme_layout'     => [
            'required' => true
        ],
        'allowed_roles',
        'css',
        'js'
    ];

}
