<?php namespace Anomaly\PagesModule\Page\Handler;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\Handler\Contract\PageHandlerInterface;
use Anomaly\Streams\Platform\Addon\Extension\Extension;

/**
 * Class PageHandlerExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Handler
 */
class PageHandlerExtension extends Extension implements PageHandlerInterface
{

    /**
     * Make the page's response.
     *
     * @param PageInterface $page
     */
    public function make(PageInterface $page)
    {
        throw new \Exception('Implement make() method.');
    }
}
