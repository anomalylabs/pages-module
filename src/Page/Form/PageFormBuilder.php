<?php namespace Anomaly\PagesModule\Page\Form;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Type\PageTypeModel;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class PageFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Form
 */
class PageFormBuilder extends FormBuilder
{

    /**
     * The page interface.
     *
     * @var PageInterface
     */
    protected $parent;

    /**
     * Skip these fields.
     *
     * @var array
     */
    protected $skips = [
        'type',
        'path',
        'parent',
        'allowed_roles'
    ];

    /**
     * Get the parent.
     *
     * @return null|PageInterface
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set the parent.
     *
     * @param $parent
     * @return $this
     */
    public function setParent(PageInterface $parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Fired before saving form entry.
     */
    public function onSaving()
    {
        $entry = $this->form->getEntry();

        if ($parent = $this->getParent()) {
            $entry->parent_id = $parent->getId();
        }

        $entry->type_type = get_class(new PageTypeModel());
        $entry->type_id   = 1;
    }
}
