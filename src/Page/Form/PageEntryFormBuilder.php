<?php namespace Anomaly\PagesModule\Page\Form;

use Anomaly\PagesModule\Entry\Form\EntryFormBuilder;
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
     * Fired after the entry form is saved.
     *
     * After the entry form is saved take the
     * entry and use it to populate the page
     * before it saves directly after.
     *
     * @param EntryFormBuilder $builder
     */
    public function onSavedEntry(EntryFormBuilder $builder)
    {
        /* @var FormBuilder $form */
        $form = $this->forms->get('page');

        $page = $form->getFormEntry();

        $entry = $builder->getFormEntry();

        $page->entry_id   = $entry->getId();
        $page->entry_type = get_class($entry);
    }

    /**
     * Get the contextual entry ID.
     *
     * @return int|mixed|null
     */
    public function getContextualId()
    {
        /* @var FormBuilder $form */
        $form = $this->forms->get('page');

        return $form->getContextualId();
    }
}
