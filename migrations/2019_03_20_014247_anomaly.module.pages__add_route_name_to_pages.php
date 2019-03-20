<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModulePagesAddRouteNameToPages
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModulePagesAddRouteNameToPages extends Migration
{

    /**
     * Don't delete the stream
     * for this assignment.
     *
     * @var bool
     */
    protected $delete = false;

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'route_name' => 'anomaly.field_type.text',
    ];

    /**
     * The addon stream.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'pages',
    ];

    /**
     * The addon assignments.
     *
     * @var array
     */
    protected $assignments = [
        'route_name' => [
            'unique' => true,
        ],
    ];

}
