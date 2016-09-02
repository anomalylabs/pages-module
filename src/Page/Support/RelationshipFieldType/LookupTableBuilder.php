<?php namespace Anomaly\PagesModule\Page\Support\RelationshipFieldType;

/**
 * Class LookupTableBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PagesModule\Page\Support\RelationshipFieldType
 */
class LookupTableBuilder extends \Anomaly\RelationshipFieldType\Table\LookupTableBuilder
{

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'title',
        'path'
    ];
}
