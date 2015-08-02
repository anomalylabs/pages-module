<?php namespace Anomaly\PagesModule\Page\Form;

use Anomaly\PagesModule\Page\PageModel;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class PageEntryFormSections
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Form
 */
class PageEntryFormSections
{

    /**
     * Handle the form sections.
     *
     * @param PageEntryFormBuilder $builder
     */
    public function handle(PageEntryFormBuilder $builder)
    {
        $builder->setSections(
            [
                'general' => [
                    'tabs' => [
                        'general'  => [
                            'title'  => 'module::tab.page',
                            'fields' => [
                                'page_title',
                                'page_slug'
                            ]
                        ],
                        'entry'    => [
                            'title'  => 'module::tab.entry',
                            'fields' => function (PageEntryFormBuilder $builder) {
                                return array_map(
                                    function (FieldType $field) {
                                        return 'entry_' . $field->getField();
                                    },
                                    array_filter(
                                        $builder->getFormFields()->base()->all(),
                                        function (FieldType $field) {
                                            return (!$field->getEntry() instanceof PageModel);
                                        }
                                    )
                                );
                            }
                        ],
                        'seo'      => [
                            'title'  => 'module::tab.seo',
                            'fields' => [
                                'page_meta_title',
                                'page_meta_keywords',
                                'page_meta_description'
                            ]
                        ],
                        'css'      => [
                            'title'  => 'module::tab.css',
                            'fields' => [
                                'page_css'
                            ]
                        ],
                        'js'       => [
                            'title'  => 'module::tab.js',
                            'fields' => [
                                'page_js'
                            ]
                        ],
                        'advanced' => [
                            'title'  => 'module::tab.advanced',
                            'fields' => [
                                'page_live',
                                'page_home',
                                'page_ttl',
                                'page_allowed_roles',
                                'page_route_suffix',
                                'page_route_constraints',
                                'page_additional_parameters'
                            ]
                        ]
                    ]
                ]
            ]
        );
    }
}
