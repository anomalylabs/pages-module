<?php namespace Anomaly\PagesModule\Page\Handler\Contract;

use Anomaly\PagesModule\Page\Contract\PageInterface;

/**
 * Interface PageHandlerInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Handler\Contract
 */
interface PageHandlerInterface
{

    /**
     * Make the page's response.
     *
     * @param PageInterface $page
     */
    public function make(PageInterface $page);
}
