<?php namespace Anomaly\PagesModule\Page\Plugin;

use Anomaly\PagesModule\Page\Plugin\Command\FindPage;
use Anomaly\PagesModule\Page\Plugin\Command\GetNav;
use Anomaly\PagesModule\Page\Plugin\Command\GetPages;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class PagePlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Plugin
 */
class PagePlugin extends Plugin
{

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'pages',
                function (array $parameters = []) {
                    return $this->dispatch(new GetPages($parameters));
                }
            ),
            new \Twig_SimpleFunction(
                'page',
                function ($identifier = null) {
                    return $this->dispatch(new FindPage($identifier));
                }
            ),
            new \Twig_SimpleFunction(
                'page_nav',
                function (array $options = []) {
                    return $this->dispatch(new GetNav($options));
                },
                [
                    'is_safe' => ['html']
                ]
            )
        ];
    }
}
