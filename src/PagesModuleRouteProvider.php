<?php namespace Anomaly\PagesModule;

use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/**
 * Class PagesModuleRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule
 */
class PagesModuleRouteProvider extends RouteServiceProvider
{

    /**
     * Map the routes.
     *
     * @param Router $router
     */
    public function map(Router $router, Request $request, PageRepositoryInterface $pages)
    {
        if ($page = $pages->findByPath($request->path())) {
            $router->any(
                $page->getPath(),
                function () use ($page) {
                    var_dump($page);
                }
            );
        }
    }
}
