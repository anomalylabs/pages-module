<?php namespace Anomaly\PagesModule\Type\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class TypeTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Type\Table
 */
class TypeTableBuilder extends TableBuilder
{

    /**
     * The table columns.
     *
     * @var array
     */
    protected $filters = [
        'name',
        'description'
    ];

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'name',
        'slug',
        'description'
    ];

    /**
     * The table buttons.
     *
     * @var array
     */
    protected $buttons = [
        'edit',
        'assignments'
    ];

    /**
     * The table actions.
     *
     * @var array
     */
    protected $actions = [
        'delete'
    ];

}
