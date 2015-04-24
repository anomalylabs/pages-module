<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModulePages_1_0_0_CreatePageTypesStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModulePages_1_0_0_CreatePageTypesStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'page_types',
        'title_column' => 'name',
        'locked'       => true
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name'   => [
            'required' => true,
            'unique'   => true
        ],
        'slug'   => [
            'config' => [
                'slugify' => 'name'
            ]
        ],
        'description',
        'layout' => [
            'required' => true
        ],
        'meta_title',
        'meta_description',
        'meta_keywords',
        'css',
        'js'
    ];

}
