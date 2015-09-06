<?php namespace Anomaly\PagesModule\Page\Tree;

use Anomaly\Streams\Platform\Ui\Tree\TreeBuilder;

/**
 * Class PageTreeBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
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
        'view' => [
            'target' => '_blank'
        ],
        'delete'
    ];

    /**
     * The item configuration.
     *
     * @var array
     */
    protected $item = [
        'value' => 'entry.edit_link'
    ];

    /**
     * The tree options.
     *
     * @var array
     */
    protected $options = [
        'item_value' => 'entry.edit_link'
    ];

}
