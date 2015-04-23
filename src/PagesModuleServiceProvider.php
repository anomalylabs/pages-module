<?php namespace Anomaly\PagesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Application\Application;
use Illuminate\Filesystem\Filesystem;
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
        'Anomaly\Streams\Platform\Model\Pages\PagesPagesEntryModel'     => 'Anomaly\PagesModule\Page\PageModel',
        'Anomaly\Streams\Platform\Model\Pages\PagesPageTypesEntryModel' => 'Anomaly\PagesModule\Type\TypeModel'
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\PagesModule\Page\Contract\PageRepositoryInterface'     => 'Anomaly\PagesModule\Page\PageRepository',
        'Anomaly\PagesModule\Type\Contract\PageTypeRepositoryInterface' => 'Anomaly\PagesModule\Type\PageTypeRepository'
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/pages/create'            => 'Anomaly\PagesModule\Http\Controller\Admin\PagesController@create',
        'admin/pages/edit/{id}'         => 'Anomaly\PagesModule\Http\Controller\Admin\PagesController@edit',
        'admin/pages/types'             => 'Anomaly\PagesModule\Http\Controller\Admin\PageTypesController@index',
        'admin/pages/types/create'      => 'Anomaly\PagesModule\Http\Controller\Admin\PageTypesController@create',
        'admin/pages/types/edit/{id}'   => 'Anomaly\PagesModule\Http\Controller\Admin\PageTypesController@edit',
        'admin/pages/types/fields/{id}' => 'Anomaly\PagesModule\Http\Controller\Admin\PageTypesController@fields',
    ];

    /**
     * Map additional routes.
     *
     * @param Filesystem  $files
     * @param Application $application
     * @param Router      $router
     */
    public function map(Filesystem $files, Application $application, Router $router)
    {
        if ($files->exists($routes = $application->getStoragePath('pages/routes.php'))) {
            $files->requireOnce($routes);
        }

        $router
            ->any(
                'admin/pages/{path?}',
                'Anomaly\PagesModule\Http\Controller\Admin\PagesController@index'
            )
            ->where('path', '(.*)');
    }
}
