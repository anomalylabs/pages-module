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
        'pages'  => [
            'buttons' => [
                'new_page' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/pages/ajax/choose_type'
                ]
            ]
        ],
        'types'  => [
            'buttons' => [
                'new_type',
                'add_field' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'enabled'     => 'admin/pages/types/fields/*',
                    'href'        => 'admin/pages/ajax/choose_field/{request.route.parameters.id}'
                ]
            ]
        ],
        'fields' => [
            'buttons' => [
                'new_field' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/pages/fields/choose'
                ]
            ]
        ]
    ];

}
