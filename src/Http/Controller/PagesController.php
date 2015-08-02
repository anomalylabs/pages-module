<?php namespace Anomaly\PagesModule\Http\Controller;

use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\PagesModule\Page\Handler\Contract\PageHandlerResponseInterface;
use Anomaly\PagesModule\Page\PageResolver;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Container\Container;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;

/**
 * Class PagesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Http\Controller
 */
class PagesController extends PublicController
{

    /**
     * Return a rendered page.
     *
     * @param PageResolver $resolver
     * @param Container    $container
     */
    public function view(PageResolver $resolver, Container $container)
    {
        if (!$page = $resolver->resolve()) {
            abort(404);
        }

        return $container->call(substr(get_class($page->getPageHandler()), 0, -9) . 'Response@make', compact('page'));
    }

    /**
     * Redirect elsewhere.
     *
     * @param PageRepositoryInterface $pages
     * @param Redirector              $redirector
     * @param Route                   $route
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function redirect(PageRepositoryInterface $pages, Redirector $redirector, Route $route)
    {
        if ($to = array_get($route->getAction(), 'anomaly.module.pages::redirect')) {
            return $redirector->to($to, array_get($route->getAction(), 'status', 302));
        }

        if ($page = $pages->find(array_get($route->getAction(), 'anomaly.module.pages::page', 0))) {
            return $redirector->to($page->path(), array_get($route->getAction(), 'status', 302));
        }

        abort(404);
    }
}
