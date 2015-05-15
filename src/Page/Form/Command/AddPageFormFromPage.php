<?php namespace Anomaly\PagesModule\Page\Form\Command;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\Form\PageEntryFormBuilder;
use Anomaly\PagesModule\Page\Form\PageFormBuilder;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class AddPageFormFromPage
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Form\Command
 */
class AddPageFormFromPage implements SelfHandling
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
     * Create a new AddPageFormFromPage instance.
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
     * @param PageFormBuilder $builder
     */
    public function handle(PageFormBuilder $builder)
    {
        $builder->setEntry($this->page->getId());

        $this->builder->addForm('page', $builder);
    }
}
