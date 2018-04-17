<?php namespace Anomaly\PagesModule;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Anomaly\Streams\Platform\Ui\ControlPanel\ControlPanelBuilder;

class PagesModuleSections
{

    public function handle(ControlPanelBuilder $builder, PreferenceRepositoryInterface $preferences)
    {
        $view = $preferences->value('anomaly.module.pages::page_view', 'list');

        $builder->setSections(
            [
                'pages'  => [
                    'buttons' => [
                        'new_page'    => [
                            'data-toggle' => 'modal',
                            'data-target' => '#modal',
                            'href'        => 'admin/pages/ajax/choose_type',
                        ],
                        'change_view' => [
                            'type'    => 'info',
                            'enabled' => 'admin/pages',
                            'icon'    => ($view == 'list' ? 'fa fa-table' : 'list-ul'),
                            'href'    => 'admin/pages/change/' . ($view == 'tree' ? 'table' : 'tree'),
                            'text'    => 'anomaly.module.pages::button.' . ($view == 'tree' ? 'table_view' : 'tree_view'),
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
            ]
        );
    }
}
