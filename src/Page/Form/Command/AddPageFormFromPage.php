<?php namespace Anomaly\PagesModule\Page\Form\Command;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\Form\PageEntryFormBuilder;
use Anomaly\PagesModule\Page\Form\PageFormBuilder;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class AddPageFormFromPage
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AddPageFormFromPage
{

    use DispatchesJobs;

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
