<?php namespace Anomaly\PagesModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class PagesModule
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule
 */
class PagesModule extends Module
{

    /**
     * The module icon.
     *
     * @var string
     */
    protected $icon = 'laptop';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'pages'      => [
            'buttons' => [
                'new_page'
            ]
        ],
        'page_types' => [
            'buttons' => [
                'create'
            ]
        ]
    ];

}
