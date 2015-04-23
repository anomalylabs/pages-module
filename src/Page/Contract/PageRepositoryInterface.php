<?php namespace Anomaly\PagesModule\Page\Contract;

use Anomaly\PagesModule\Page\PageCollection;

/**
 * Interface PageRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Contract
 */
interface PageRepositoryInterface
{

    /**
     * Return all pages.
     *
     * @return PageCollection
     */
    public function all();

    /**
     * Find a page by it's path.
     *
     * @param $path
     * @return null|PageInterface
     */
    public function findByPath($path);

    /**
     * Save a page.
     *
     * @param PageInterface $page
     * @return PageInterface
     */
    public function save(PageInterface $page);
}
