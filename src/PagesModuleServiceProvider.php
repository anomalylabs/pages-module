<?php namespace Anomaly\PagesModule;

use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/**
 * Class PagesModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule
 */
class PagesModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The class bindings.
     *
     * @var array
     */
    protected $bindings = [
        'Anomaly\PagesModule\Page\PageModel' => 'Anomaly\PagesModule\Page\PageModel'
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\PagesModule\Page\Contract\PageRepositoryInterface' => 'Anomaly\PagesModule\Page\PageRepository'
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/pages'           => 'Anomaly\PagesModule\Http\Controller\Admin\PagesController@index',
        'admin/pages/create'    => 'Anomaly\PagesModule\Http\Controller\Admin\PagesController@create',
        'admin/pages/edit/{id}' => 'Anomaly\PagesModule\Http\Controller\Admin\PagesController@edit'
    ];

    /**
     * Map additional routes.
     *
     * @param PageRepositoryInterface $pages
     * @param Router                  $router
     */
    public function map(PageRepositoryInterface $pages, Router $router)
    {
        $router->before(
            function (Request $request) use ($router, $pages) {
                if ($page = $pages->findByPath($request->path())) {
                    dd('Render Page #' . $page->getId() . ': ' . $page->getTitle());
                }
            }
        );
    }
}
