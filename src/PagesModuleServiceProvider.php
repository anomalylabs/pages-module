<?php namespace Anomaly\PagesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

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

}
