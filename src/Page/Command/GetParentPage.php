<?php namespace Anomaly\PagesModule\Page\Command;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\PageCollection;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetParentPage
 *
 * @page          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Command
 */
class GetParentPage implements SelfHandling
{

    /**
     * The root path.
     *
     * @var string
     */
    private $root;

    /**
     * The page collection.
     *
     * @var PageCollection
     */
    protected $pages;

    /**
     * Create a new GetParentPage instance.
     *
     * @param string         $root
     * @param PageCollection $pages
     */
    public function __construct($root, PageCollection $pages)
    {
        $this->root  = $root;
        $this->pages = $pages;
    }

    /**
     * Handle the command.
     *
     * @return PageInterface|null
     */
    public function handle()
    {
        /* @var PageInterface $page */
        foreach ($this->pages as $page) {
            if ($this->root == $page->getPath()) {
                return $page;
            }
        }

        return null;
    }
}
