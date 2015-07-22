<?php namespace Anomaly\PagesModule\Page\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface PageRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Contract
 */
interface PageRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Return the first page.
     *
     * @return PageInterface
     */
    public function first();

    /**
     * Find a page by it's path.
     *
     * @param $path
     * @return null|PageInterface
     */
    public function findByPath($path);
}
