<?php namespace Anomaly\PagesModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class PagesModule
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
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
                    'href'        => 'admin/pages/ajax/choose_type',
                ],
            ],
        ],
        'types'  => [
            'buttons'  => [
                'new_type',
            ],
            'sections' => [
                'assignments' => [
                    'hidden'  => true,
                    'href'    => 'admin/pages/types/assignments/{request.route.parameters.stream}',
                    'buttons' => [
                        'assign_fields' => [
                            'data-toggle' => 'modal',
                            'data-target' => '#modal',
                            'href'        => 'admin/pages/types/assignments/{request.route.parameters.stream}/choose',
                        ],
                    ],
                ],
            ],
        ],
        'fields' => [
            'buttons' => [
                'new_field' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/pages/fields/choose',
                ],
            ],
        ],
    ];

}
