<?php namespace Anomaly\PagesModule;

use Illuminate\Support\ServiceProvider;

/**
 * Class PagesModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule
 */
class PagesModuleServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Page services.
        $this->app->bind(
            'Anomaly\PagesModule\Page\PageModel',
            'Anomaly\PagesModule\Page\PageModel'
        );

        $this->app->bind(
            'Anomaly\PagesModule\Page\Contract\PageRepositoryInterface',
            'Anomaly\PagesModule\Page\PageRepository'
        );

        $this->app->register('Anomaly\PagesModule\PagesModuleRouteProvider');
    }
}
