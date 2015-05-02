<?php namespace Anomaly\PagesModule\Type\Field\Table;

use Anomaly\PagesModule\Type\PageTypeModel;
use Anomaly\Streams\Platform\Field\Table\FieldTableBuilder;
use Anomaly\Streams\Platform\Ui\Table\Table;

/**
 * Class PageTypeFieldTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Type\Field\Table
 */
class PageTypeFieldTableBuilder extends FieldTableBuilder
{

    /**
     * Create a new PageTypeFieldTableBuilder instance.
     *
     * @param Table         $table
     * @param PageTypeModel $model
     */
    public function __construct(Table $table, PageTypeModel $model)
    {
        $this->setStream($model->getStream());

        parent::__construct($table);
    }
}
