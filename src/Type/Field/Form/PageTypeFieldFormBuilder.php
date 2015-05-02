<?php namespace Anomaly\PagesModule\Type\Field\Form;

use Anomaly\PagesModule\Type\PageTypeModel;
use Anomaly\Streams\Platform\Field\Form\FieldFormBuilder;
use Anomaly\Streams\Platform\Ui\Form\Form;

/**
 * Class PageTypeFieldFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Type\Field\Form
 */
class PageTypeFieldFormBuilder extends FieldFormBuilder
{

    /**
     * Create a new PageTypeFieldFormBuilder instance.
     *
     * @param Form          $form
     * @param PageTypeModel $model
     */
    public function __construct(Form $form, PageTypeModel $model)
    {
        $this->setStream($model->getStream());

        parent::__construct($form);
    }
}
