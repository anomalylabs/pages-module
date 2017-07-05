<?php namespace Anomaly\PagesModule\Page\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class PageTableBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class PageTableBuilder extends TableBuilder
{

    /**
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'search' => [
            'fields' => [
                'title',
                'path',
            ],
        ],
    ];

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'title' => [
            'sort_column' => 'path',
            'wrapper'     => '
                    <strong>{value.title}</strong>
                    <br>
                    <small class="text-muted">{value.path}</small>',
            'value'       => [
                'path'  => 'entry.path',
                'title' => 'entry.title',
            ],
        ],
        'entry.enabled.label',
    ];

    /**
     * The table buttons.
     *
     * @var array
     */
    protected $buttons = [
        'add'  => [
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'text'        => 'anomaly.module.pages::button.create_child_page',
            'href'        => 'admin/pages/ajax/choose_type?parent={entry.id}',
        ],
        'view' => [
            'target' => '_blank',
        ],
    ];

    /**
     * The table actions.
     *
     * @var array
     */
    protected $actions = [
        'delete',
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'sortable' => false,
    ];

}
