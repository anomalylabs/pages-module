<?php namespace Anomaly\PagesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Application\Application;
use Illuminate\Filesystem\Filesystem;

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
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/pages'                                           => 'Anomaly\PagesModule\Http\Controller\Admin\PagesController@index',
        'admin/pages/create'                                    => 'Anomaly\PagesModule\Http\Controller\Admin\PagesController@create',
        'admin/pages/edit/{id}'                                 => 'Anomaly\PagesModule\Http\Controller\Admin\PagesController@edit',
        'admin/pages/view/{id}'                                 => 'Anomaly\PagesModule\Http\Controller\Admin\PagesController@view',
        'admin/pages/delete/{id}'                               => 'Anomaly\PagesModule\Http\Controller\Admin\PagesController@delete',
        'admin/pages/types'                                     => 'Anomaly\PagesModule\Http\Controller\Admin\TypesController@index',
        'admin/pages/types/create'                              => 'Anomaly\PagesModule\Http\Controller\Admin\TypesController@create',
        'admin/pages/types/edit/{id}'                           => 'Anomaly\PagesModule\Http\Controller\Admin\TypesController@edit',
        'admin/pages/types/fields/{id}'                         => 'Anomaly\PagesModule\Http\Controller\Admin\TypesController@fields',
        'admin/pages/types/fields/{id}/assign/{field}'          => 'Anomaly\PagesModule\Http\Controller\Admin\TypesController@assign',
        'admin/pages/types/fields/{id}/assignment/{assignment}' => 'Anomaly\PagesModule\Http\Controller\Admin\TypesController@assignment',
        'admin/pages/fields'                                    => 'Anomaly\PagesModule\Http\Controller\Admin\FieldsController@index',
        'admin/pages/fields/choose'                             => 'Anomaly\PagesModule\Http\Controller\Admin\FieldsController@choose',
        'admin/pages/fields/create'                             => 'Anomaly\PagesModule\Http\Controller\Admin\FieldsController@create',
        'admin/pages/fields/edit/{id}'                          => 'Anomaly\PagesModule\Http\Controller\Admin\FieldsController@edit',
        'admin/pages/ajax/choose_type'                          => 'Anomaly\PagesModule\Http\Controller\Admin\AjaxController@chooseType',
        'admin/pages/ajax/choose_field/{id}'                    => 'Anomaly\PagesModule\Http\Controller\Admin\AjaxController@chooseField',
        'admin/pages/settings'                                  => 'Anomaly\PagesModule\Http\Controller\Admin\SettingsController@index',
    ];

    /**
     * The class bindings.
     *
     * @var array
     */
    protected $bindings = [
        'Anomaly\Streams\Platform\Model\Pages\PagesPagesEntryModel' => 'Anomaly\PagesModule\Page\PageModel',
        'Anomaly\Streams\Platform\Model\Pages\PagesTypesEntryModel' => 'Anomaly\PagesModule\Type\TypeModel'
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\PagesModule\Page\Contract\PageRepositoryInterface' => 'Anomaly\PagesModule\Page\PageRepository',
        'Anomaly\PagesModule\Type\Contract\TypeRepositoryInterface' => 'Anomaly\PagesModule\Type\TypeRepository'
    ];

    /**
     * Map additional routes.
     *
     * @param Filesystem  $files
     * @param Application $application
     */
    public function map(Filesystem $files, Application $application)
    {
        // Include public routes.
        if ($files->exists($routes = $application->getStoragePath('pages/routes.php'))) {
            $files->requireOnce($routes);
        }
    }
}
