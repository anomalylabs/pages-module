<?php namespace Anomaly\PagesModule\Page\Plugin\Command;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\View\Factory;

/**
 * Class GetNav
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Plugin\Command
 */
class GetNav implements SelfHandling
{

    /**
     * The options.
     *
     * @var array
     */
    protected $options;

    /**
     * Create a new GetNav command.
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

        $parent = array_get($this->options, 'parent');

        return $view->make(
            array_get($this->options, 'view', 'anomaly.module.pages::nav'),
            [
                'pages'   => $pages,
                'parent'  => $parent,
                'options' => $this->options
            ]
        )->render();
    }
}
