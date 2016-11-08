<?php namespace Anomaly\PagesModule\Page\Command;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;


/**
 * Class UpdatePaths
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class UpdatePaths
{

    /**
     * The page instance.
     *
     * @var PageInterface
     */
    protected $page;

    /**
     * Create a new UpdatePaths instance.
     *
     * @param PageInterface $page
     */
    public function __construct(PageInterface $page)
    {
        $this->page = $page;
    }

    /**
     * Handle the command.
     *
     * @param PageRepositoryInterface $pages
     */
    public function handle(PageRepositoryInterface $pages)
    {
        foreach ($this->page->getChildren() as $page) {
            if ($page instanceof PageInterface && $page->isEnabled()) {
                $pages->save(
                    $page->setAttribute(
                        'path',
                        ($this->page->isHome() ? $this->page->getSlug() : $this->page->getPath())
                        . '/' . $page->getSlug()
                    )
                );
            }
        }
    }
}
