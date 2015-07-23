<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModulePages_1_0_0_CreatePagesStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModulePages_1_0_0_CreatePagesStream extends Migration
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
        'live',
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
        'allowed_roles',
        'css',
        'js'
    ];

}
