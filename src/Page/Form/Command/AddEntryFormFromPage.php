<?php namespace Anomaly\PagesModule\Page\Form\Command;

use Anomaly\PagesModule\Entry\Form\EntryFormBuilder;
use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\Form\PageEntryFormBuilder;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class AddEntryFormFromPage
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Form\Command
 */
class AddEntryFormFromPage implements SelfHandling
{

    use DispatchesCommands;

    /**
     * The multiple form builder.
     *
     * @var PageEntryFormBuilder
     */
    protected $builder;

    /**
     * The page instance.
     *
     * @var PageInterface
     */
    protected $page;

    /**
     * Create a new AddEntryFormFromPage instance.
     *
     * @param PageEntryFormBuilder $builder
     * @param PageInterface        $page
     */
    public function __construct(PageEntryFormBuilder $builder, PageInterface $page)
    {
        $this->builder = $builder;
        $this->page    = $page;
    }

    /**
     * Handle the command.
     *
     * @param EntryFormBuilder $builder
     */
    public function handle(EntryFormBuilder $builder)
    {
        $type = $this->page->getType();

        $builder->setModel($type->getEntryModelName());
        $builder->setEntry($this->page->getEntryId());

        $this->builder->addForm('entry', $builder);
    }
}
