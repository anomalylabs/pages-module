<?php namespace Anomaly\PagesModule\Page\Handler\Contract;

use Anomaly\PagesModule\Page\Contract\PageInterface;

/**
 * Interface PageHandlerResponseInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Handler
 */
interface PageHandlerResponseInterface
{

    /**
     * Make the response for a page.
     *
     * @param PageInterface $page
     * @return mixed
     */
    public function make(PageInterface $page);
}
