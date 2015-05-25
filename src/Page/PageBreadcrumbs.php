<?php namespace Anomaly\PagesModule\Page;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;

/**
 * Class PageBreadcrumbs
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page
 */
class PageBreadcrumbs
{

    /**
     * The breadcrumb collection.
     *
     * @var BreadcrumbCollection
     */
    protected $breadcrumbs;

    /**
     * Create a new PageBreadcrumbs instance.
     *
     * @param BreadcrumbCollection $breadcrumbs
     */
    public function __construct(BreadcrumbCollection $breadcrumbs)
    {
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Make the page breadcrumbs.
     *
     * @param PageInterface $page
     */
    public function make(PageInterface $page)
    {
        $breadcrumbs = [
            $page->getTitle() => $page->path()
        ];

        $this->loadParent($page, $breadcrumbs);

        foreach ($breadcrumbs as $key => $url) {
            $this->breadcrumbs->add($key, $url);
        }
    }

    /**
     * Load the parent breadcrumbs.
     *
     * @param PageInterface $page
     * @param array         $breadcrumbs
     */
    protected function loadParent(PageInterface $page, array &$breadcrumbs)
    {
        if ($parent = $page->getParent()) {

            $breadcrumbs[$parent->getTitle()] = $parent->path();

            $this->loadParent($parent, $breadcrumbs);
        }
    }
}
