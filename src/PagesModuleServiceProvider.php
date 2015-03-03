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
     * Defer this service provider.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Anomaly\PagesModule\Page\PageServiceProvider');
        $this->app->register('Anomaly\PagesModule\PagesModuleServiceProvider');
    }
}
