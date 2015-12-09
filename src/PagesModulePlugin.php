<?php namespace Anomaly\PagesModule;

use Anomaly\PagesModule\Page\Command\GetPage;
use Anomaly\PagesModule\Page\Command\RenderNav;
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
     * Get the plugin functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'page_nav',
                function (array $options = []) {
                    return $this->dispatch(new RenderNav($options));
                },
                [
                    'is_safe' => ['html']
                ]
            ),
            new \Twig_SimpleFunction(
                'page',
                function ($identifier = null) {
                    return (new Decorator())->decorate($this->dispatch(new GetPage($identifier)));
                }
            )
        ];
    }
}
