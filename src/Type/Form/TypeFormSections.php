<?php namespace Anomaly\PagesModule\Type\Form;

class TypeFormSections
{

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
                                'description'
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
