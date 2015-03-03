<?php namespace Anomaly\PagesModule\Page;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class PageRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page
 */
class PageRouteProvider extends RouteServiceProvider
{

    /**
     * Map the routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->any(
            'admin/pages',
            'Anomaly\PagesModule\Http\Controller\Admin\PagesController@index'
        );

        $router->any(
            'admin/pages/create',
            'Anomaly\PagesModule\Http\Controller\Admin\PagesController@create'
        );

        $router->any(
            'admin/pages/edit/{id}',
            'Anomaly\PagesModule\Http\Controller\Admin\PagesController@edit'
        );
    }
}
