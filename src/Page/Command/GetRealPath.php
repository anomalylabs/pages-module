<?php namespace Anomaly\PagesModule\Page\Command;

use Anomaly\PagesModule\Page\Contract\PageInterface;


/**
 * Class GetRealPath
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class GetRealPath
{

    /**
     * The page instance.
     *
     * @var PageInterface
     */
    protected $page;

    /**
     * Create a new GetRealPath instance.
     *
     * @param PageInterface $page
     */
    public function __construct(PageInterface $page)
    {
        $this->page = $page;
    }

    /**
     * Handle the command.
     */
    public function handle()
    {
        if ($parent = $this->page->getParent()) {
            return ($parent->isHome())
            ? $parent->getSlug() . '/' . $this->page->getSlug()
            : $parent->getPath() . '/' . $this->page->getSlug();
        }
        else {
            return ($this->page->isHome())
            ? '/'
            : '/' . $this->page->getSlug();
        }
    }
}
