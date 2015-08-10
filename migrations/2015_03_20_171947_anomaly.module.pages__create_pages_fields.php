<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModulePagesCreatePagesFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModulePagesCreatePagesFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'title'                 => 'anomaly.field_type.text',
        'slug'                  => [
            'type'   => 'anomaly.field_type.slug',
            'config' => [
                'slugify' => 'title'
            ]
        ],
        'live'                  => [
            'type'   => 'anomaly.field_type.boolean',
            'config' => [
                'default_value' => false,
            ]
        ],
        'home'                  => [
            'type'   => 'anomaly.field_type.boolean',
            'config' => [
                'default_value' => false,
            ]
        ],
        'meta_title'            => 'anomaly.field_type.text',
        'meta_description'      => 'anomaly.field_type.textarea',
        'meta_keywords'         => 'anomaly.field_type.tags',
        'ttl'                   => [
            'type'   => 'anomaly.field_type.integer',
            'config' => [
                'min'  => 0,
                'step' => 1,
                'page' => 5
            ]
        ],
        'css'                   => [
            'type'   => 'anomaly.field_type.editor',
            'config' => [
                'mode' => 'css'
            ]
        ],
        'js'                    => [
            'type'   => 'anomaly.field_type.editor',
            'config' => [
                'mode' => 'javascript'
            ]
        ],
        'layout'                => [
            'type'   => 'anomaly.field_type.editor',
            'config' => [
                'default_value' => '<h1>{{ page.title }}</h1>',
                'mode'          => 'twig'
            ]
        ],
        'allowed_roles'         => [
            'type'   => 'anomaly.field_type.multiple',
            'config' => [
                'related' => 'Anomaly\UsersModule\Role\RoleModel'
            ]
        ],
        'parent'                => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\PagesModule\Page\PageModel'
            ]
        ],
        'theme_layout'          => [
            'type'   => 'anomaly.field_type.select',
            'config' => [
                'handler' => 'Anomaly\SelectFieldType\Handler\Layouts@handle'
            ]
        ],
        'type'                  => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\PagesModule\Type\TypeModel'
            ]
        ],
        'page_handler'          => [
            'type'   => 'anomaly.field_type.addon',
            'config' => [
                'type'          => 'extension',
                'search'        => 'anomaly.module.pages::page_handler.*',
                'default_value' => 'anomaly.extension.default_page_handler'
            ]
        ],
        'entry'                 => 'anomaly.field_type.polymorphic',
        'name'                  => 'anomaly.field_type.text',
        'description'           => 'anomaly.field_type.textarea',
        'route_suffix'          => 'anomaly.field_type.text',
        'route_constraints'     => 'anomaly.field_type.textarea',
        'additional_parameters' => 'anomaly.field_type.textarea'
    ];

}
