<?php namespace Anomaly\PagesModule\Page\Command;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\View\Factory;

/**
 * Class RenderNav
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Command
 */
class RenderNav implements SelfHandling
{

    /**
     * The options.
     *
     * @var array
     */
    protected $options;

    /**
     * Create a new RenderNav command.
     *
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * Handle the command.
     *
     * @param PageRepositoryInterface $pages
     * @return null|PageInterface
     */
    public function handle(PageRepositoryInterface $pages, Factory $view)
    {
        $pages = $pages->navigation();

        return $view->make(
            array_get($this->options, 'view', 'anomaly.module.pages::nav'),
            [
                'pages'   => $pages,
                'options' => $this->options
            ]
        )->render();
    }
}
