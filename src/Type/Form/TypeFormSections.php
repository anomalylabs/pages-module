<?php namespace Anomaly\PagesModule\Type\Form;

/**
 * Class TypeFormSections
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Type\Form
 */
class TypeFormSections
{

    /**
     * Handle the form sections.
     *
     * @param TypeFormBuilder $builder
     */
    public function handle(TypeFormBuilder $builder)
    {
        $builder->setSections(
            [
                'general' => [
                    'tabs' => [
                        'general' => [
                            'title'  => 'module::tab.general',
                            'fields' => [
                                'name',
                                'slug',
                                'description',
                                'page_handler'
                            ]
                        ],
                        'layout'  => [
                            'title'  => 'module::tab.layout',
                            'fields' => [
                                'theme_layout',
                                'layout'
                            ]
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
