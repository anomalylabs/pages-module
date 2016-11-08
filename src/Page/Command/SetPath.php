<?php namespace Anomaly\PagesModule\Page\Command;

use Anomaly\PagesModule\Page\Contract\PageInterface;


/**
 * Class SetPath
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class SetPath
{

    /**
     * The page instance.
     *
     * @var PageInterface
     */
    protected $page;

    /**
     * Create a new SetPath instance.
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
        if (!$this->page->isEnabled()) {
            $path = 'pages/preview/' . $this->page->getStrId();
        } else {
            if ($parent = $this->page->getParent()) {
                $path = ($parent->isHome() ? $parent->getSlug() : $parent->getPath()) . '/' . $this->page->getSlug();
            } elseif ($this->page->isHome()) {
                $path = '/';
            } else {
                $path = '/' . $this->page->getSlug();
            }
        }

        $this->page->setAttribute('path', $path);
    }
}
