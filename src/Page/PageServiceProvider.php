<?php namespace Anomaly\PagesModule\Page;

use Illuminate\Support\ServiceProvider;

/**
 * Class PageServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page
 */
class PageServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Anomaly\PagesModule\Page\PageModel',
            'Anomaly\PagesModule\Page\PageModel'
        );

        $this->app->bind(
            'Anomaly\PagesModule\Page\Contract\PageRepositoryInterface',
            'Anomaly\PagesModule\Page\PageRepository'
        );

        $this->app->register('Anomaly\PagesModule\Page\PageRouteProvider');
    }
}
