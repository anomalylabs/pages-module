<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModulePages_1_0_0_CreatePagesFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModulePages_1_0_0_CreatePagesFields extends Migration
{

    /**
     * The module fields.
     *
     * @var array
     */
    protected $fields = [
        'title'            => 'anomaly.field_type.text',
        'slug'             => [
            'type'   => 'anomaly.field_type.slug',
            'config' => [
                'slugify' => 'title'
            ]
        ],
        'enabled'          => [
            'type'   => 'anomaly.field_type.boolean',
            'config' => [
                'default_value' => 'on',
            ]
        ],
        'meta_title'       => 'anomaly.field_type.text',
        'meta_description' => 'anomaly.field_type.textarea',
        'meta_keywords'    => 'anomaly.field_type.tags',
        'ttl'              => [
            'type'   => 'anomaly.field_type.integer',
            'config' => [
                'min'  => 0,
                'step' => 60,
                'page' => 500
            ]
        ],
        'css'              => [
            'type'   => 'anomaly.field_type.editor',
            'config' => [
                'mode' => 'css'
            ]
        ],
        'js'               => [
            'type'   => 'anomaly.field_type.editor',
            'config' => [
                'mode' => 'javascript'
            ]
        ],
        'layout'           => [
            'type'   => 'anomaly.field_type.editor',
            'config' => [
                'default_value' => '<h1>{{ page.title }}</h1>',
                'mode'          => 'twig'
            ]
        ],
        'handler'          => [
            'type'   => 'anomaly.field_type.addon',
            'config' => [
                'type'          => 'extensions',
                'default_value' => 'anomaly.extension.default_page_handler',
                'search'        => 'anomaly.module.pages::page_handler.*'
            ]
        ],
        'allowed_roles'    => [
            'type'   => 'anomaly.field_type.multiple',
            'config' => [
                'related' => 'Anomaly\UsersModule\Role\RoleModel'
            ]
        ],
        'parent'           => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\PagesModule\Page\PageModel'
            ]
        ],
        'theme_layout'     => [
            'type'   => 'anomaly.field_type.select',
            'config' => [
                'handler' => 'Anomaly\PagesModule\FieldType\ThemeLayout\ThemeLayoutOptions@handle'
            ]
        ],
        'type'             => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\PagesModule\Type\TypeModel'
            ]
        ],
        'entry'            => 'anomaly.field_type.polymorphic',
        'name'             => 'anomaly.field_type.text',
        'description'      => 'anomaly.field_type.textarea'
    ];

}
