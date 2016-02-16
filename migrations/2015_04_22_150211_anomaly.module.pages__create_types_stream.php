<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModulePagesCreateTypesStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModulePagesCreateTypesStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'types',
        'title_column' => 'name',
        'translatable' => true
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name'         => [
            'required' => true,
            'unique'   => true
        ],
        'slug'         => [
            'required' => true,
            'unique'   => true,
            'config'   => [
                'slugify' => 'name',
                'type'    => '_'
            ]
        ],
        'description',
        'theme_layout' => [
            'required' => true
        ],
        'layout'       => [
            'required' => true
        ],
        'page_handler' => [
            'required' => true
        ]
    ];

}
