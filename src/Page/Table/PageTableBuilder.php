<?php namespace Anomaly\PagesModule\Page\Table;

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
     * The table model.
     *
     * @var string
     */
    protected $model = 'Anomaly\PagesModule\Page\PageModel';

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'title',
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

}
