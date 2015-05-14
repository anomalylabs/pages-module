<?php namespace Anomaly\PagesModule\Page;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Illuminate\Container\Container;
use Illuminate\Http\Response;

/**
 * Class PageResponse
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page
 */
class PageResponse
{

    /**
     * The service container.
     *
     * @var Container
     */
    protected $container;

    /**
     * Create a new PageResponse instance.
     *
     * @param Container $container
     */
    function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Make the page response.
     *
     * @param PageInterface $page
     */
    public function make(PageInterface $page)
    {
        $page->setResponse($this->container->call([$page->getTypeHandler(), 'response'], compact('page')));
    }
}
