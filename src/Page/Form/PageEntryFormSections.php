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
                        'general' => [
                            'title'  => 'module::tab.page',
                            'fields' => [
                                'title',
                                'slug',
                                'enabled',
                                'ttl'
                            ]
                        ],
                        'entry'   => [
                            'title'  => 'module::tab.entry',
                            'fields' => function (PageEntryFormBuilder $builder) {
                                return array_map(
                                    function (FieldType $field) {
                                        return $field->getField();
                                    },
                                    array_filter(
                                        $builder->getFormFields()->all(),
                                        function (FieldType $field) {
                                            return (!$field->getEntry() instanceof PageModel);
                                        }
                                    )
                                );
                            }
                        ],
                        'seo'     => [
                            'title'  => 'module::tab.seo',
                            'fields' => [
                                'meta_title',
                                'meta_keywords',
                                'meta_description'
                            ]
                        ],
                        'css'     => [
                            'title'  => 'module::tab.css',
                            'fields' => [
                                'css'
                            ]
                        ],
                        'js'      => [
                            'title'  => 'module::tab.js',
                            'fields' => [
                                'js'
                            ]
                        ]
                    ]
                ]
            ]
        );
    }
}
