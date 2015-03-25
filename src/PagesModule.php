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
     * The module navigation role.
     *
     * @var string
     */
    protected $navigation = 'streams::navigation.content';

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
