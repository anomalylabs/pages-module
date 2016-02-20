<?php namespace Anomaly\PagesModule\Page\Tree;

use Anomaly\Streams\Platform\Ui\Tree\TreeBuilder;

/**
 * Class PageTreeBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PagesModule\Page\Tree
 */
class PageTreeBuilder extends TreeBuilder
{

    /**
     * The tree buttons.
     *
     * @var array
     */
    protected $buttons = [
        'add'  => [
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'text'        => 'anomaly.module.pages::button.create_child_page',
            'href'        => 'admin/pages/ajax/choose_type?parent={entry.id}'
        ],
        'view' => [
            'target' => '_blank'
        ],
        'delete'
    ];

}
