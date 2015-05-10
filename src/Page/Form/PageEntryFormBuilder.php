<?php namespace Anomaly\PagesModule\Page\Form;

use Anomaly\PagesModule\Entry\Form\EntryFormBuilder;
use Anomaly\PagesModule\Type\Contract\PageTypeInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\Streams\Platform\Ui\Form\Multiple\MultipleFormBuilder;

/**
 * Class PageEntryFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Form
 */
class PageEntryFormBuilder extends MultipleFormBuilder
{

    /**
     * The page type.
     *
     * @var PageTypeInterface
     */
    protected $type;

    /**
     * Set the page type.
     *
     * @param PageTypeInterface $type
     * @return $this
     */
    public function setType(PageTypeInterface $type)
    {
        $this->type = $type;

        return $this;
    }

    public function onSavedEntry(EntryFormBuilder $builder)
    {
        /* @var FormBuilder $pageForm */
        $pageForm = $this->forms->get('page');

        $page = $pageForm->getFormEntry();

        $entry = $builder->getFormEntry();

        $page->type_id    = $this->type->getId();
        $page->entry_id   = $entry->getId();
        $page->entry_type = get_class($entry);
    }
}
