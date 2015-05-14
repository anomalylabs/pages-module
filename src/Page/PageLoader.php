<?php namespace Anomaly\PagesModule\Page;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Illuminate\Container\Container;

/**
 * Class PageLoader
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page
 */
class PageLoader
{

    /**
     * The service container.
     *
     * @var Container
     */
    protected $container;

    /**
     * Create a new PageLoader instance.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Load page data to the template.
     *
     * @param PageInterface $page
     */
    public function load(PageInterface $page)
    {
        $this->container->call([$page->getTypeHandler(), 'load'], compact('page'));
    }
}
