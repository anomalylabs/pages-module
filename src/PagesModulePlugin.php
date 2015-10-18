<?php namespace Anomaly\PagesModule;

use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\Streams\Platform\Support\Decorator;

/**
 * Class PagesModulePlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule
 */
class PagesModulePlugin extends Plugin
{

    /**
     * The page repository.
     *
     * @var PageRepositoryInterface
     */
    protected $pages;

    /**
     * The presenter decorator.
     *
     * @var Decorator
     */
    protected $decorator;

    /**
     * Create a new PagesModulePlugin instance.
     *
     * @param PageRepositoryInterface $pages
     * @param Decorator               $decorator
     */
    public function __construct(PageRepositoryInterface $pages, Decorator $decorator)
    {
        $this->pages     = $pages;
        $this->decorator = $decorator;
    }

    /**
     * Get the
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('pages_all', [$this->pages, 'all'])
        ];
    }
}
