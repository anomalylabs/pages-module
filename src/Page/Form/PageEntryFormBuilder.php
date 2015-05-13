<?php namespace Anomaly\PagesModule\Page\Form;

use Anomaly\PagesModule\Entry\Form\EntryFormBuilder;
use Anomaly\PagesModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Ui\Form\Form;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\Streams\Platform\Ui\Form\FormCollection;
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
     * @var TypeInterface
     */
    protected $type;

    /**
     * Create a new PageEntryFormBuilder instnace.
     *
     * @param Form             $form
     * @param FormCollection   $forms
     * @param PageFormBuilder  $page
     * @param EntryFormBuilder $entry
     */
    public function __construct(Form $form, FormCollection $forms, PageFormBuilder $page, EntryFormBuilder $entry)
    {
        $forms->add('page', $page);
        $forms->add('entry', $entry);

        parent::__construct($form, $forms);
    }

    /**
     * Get the type.
     *
     * @return TypeInterface
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the page type.
     *
     * @param int $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

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
        /* @var FormBuilder $pageForm */
        $pageForm = $this->forms->get('page');

        $page = $pageForm->getFormEntry();

        $entry = $builder->getFormEntry();

        $page->type_id    = $this->getType();
        $page->entry_id   = $entry->getId();
        $page->entry_type = get_class($entry);
    }
}
