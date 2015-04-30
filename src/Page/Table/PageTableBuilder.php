<?php namespace Anomaly\PagesModule\Page\Table;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\Streams\Platform\Model\EloquentQueryBuilder;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class PageTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Table
 */
class PageTableBuilder extends TableBuilder
{

    /**
     * The parent page.
     *
     * @var null|PageInterface
     */
    protected $parent = null;

    /**
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'title',
        'path'
    ];

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        [
            'heading' => 'title',
            'value'   => 'entry.view_link'
        ],
        [
            'heading' => 'path',
            'value'   => '/{entry.path}'
        ]
    ];

    /**
     * The table buttons.
     *
     * @var array
     */
    protected $buttons = [
        'edit',
        [
            'button' => 'view',
            'target' => '_blank',
            'href'   => '/{entry.path}',
        ]
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'sortable' => true
    ];

    /**
     * Fired just before querying.
     *
     * @param EloquentQueryBuilder $query
     */
    public function onQuerying(EloquentQueryBuilder $query)
    {
        $query->where('parent_id', $this->parent ? $this->parent->getId() : null);
    }

    /**
     * Set the parent page.
     *
     * @param PageInterface $parent
     * @return $this
     */
    public function setParent(PageInterface $parent)
    {
        $this->parent = $parent;

        return $this;
    }
}
