<?php namespace Anomaly\PagesModule;

use Anomaly\PagesModule\Page\Command\GetPage;
use Anomaly\PagesModule\Page\Command\RenderNavigation;
use Anomaly\PagesModule\Page\PageModel;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\Streams\Platform\Support\Collection;
use Anomaly\Streams\Platform\Support\Decorator;
use Twig\TwigFunction;

/**
 * Class PagesModulePlugin
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
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
            new TwigFunction(
                'structure',
                function ($root = null) {
                    return (new PagesModuleCriteria(
                        'render',
                        function (Collection $options) use ($root) {

                            if ($root) {
                                $options->put('root', $root);
                            }

                            return dispatch_sync(new RenderNavigation($options));
                        }
                    ))
                        ->setModel(PageModel::class)
                        ->setCachePrefix('anomaly.module.pages::pages.structure');
                }
            ),
            new TwigFunction(
                'page',
                function ($identifier = null) {
                    return (new Decorator())->decorate(dispatch_sync(new GetPage($identifier)));
                }
            ),
        ];
    }
}
