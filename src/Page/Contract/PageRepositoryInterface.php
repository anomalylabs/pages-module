<?php namespace Anomaly\PagesModule\Page\Contract;

use Anomaly\PagesModule\Page\PageCollection;
use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface PageRepositoryInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
interface PageRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Return only accessible pages.
     *
     * @return PageCollection
     */
    public function accessible();

    /**
     * Unset home pages.
     *
     * @return void
     */
    public function unsetHomePages();

    /**
     * Find a page by it's string ID.
     *
     * @param $id
     * @return null|PageInterface
     */
    public function findByStrId($id);

    /**
     * Find a page by it's path.
     *
     * @param $path
     * @return PageInterface|null
     */
    public function findByPath($path);
}
