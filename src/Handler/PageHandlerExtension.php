<?php namespace Anomaly\PagesModule\Handler;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\Streams\Platform\Addon\Extension\Extension;

/**
 * Class PageHandlerExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Handler
 */
abstract class PageHandlerExtension extends Extension
{

    /**
     * The page instance.
     *
     * @var null|PageInterface
     */
    protected $page = null;

    /**
     * Get the page.
     *
     * @return PageInterface|null
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set the page.
     *
     * @param PageInterface $page
     */
    public function setPage(PageInterface $page)
    {
        $this->page = $page;

        return $this;
    }
}
