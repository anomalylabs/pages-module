<?php namespace Anomaly\PagesModule\Http\Controller;

use Anomaly\PagesModule\Page\Command\AddPageAssets;
use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\PagesModule\Page\PageAuthorizer;
use Anomaly\PagesModule\Page\PageBreadcrumbs;
use Anomaly\PagesModule\Page\PageHttp;
use Anomaly\PagesModule\Page\PageLoader;
use Anomaly\PagesModule\Page\PageResolver;
use Anomaly\PagesModule\Page\PageResponse;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Http\Response;
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
     * View a page.
     *
     * @param PageHttp        $http
     * @param PageLoader      $loader
     * @param PageResolver    $resolver
     * @param PageResponse    $response
     * @param PageAuthorizer  $authorizer
     * @param PageBreadcrumbs $breadcrumbs
     * @return Response|null
     */
    public function view(
        PageHttp $http,
        PageLoader $loader,
        PageResolver $resolver,
        PageResponse $response,
        PageAuthorizer $authorizer,
        PageBreadcrumbs $breadcrumbs
    ) {
        if (!$page = $resolver->resolve()) {
            abort(404);
        }

        $this->dispatch(new AddPageAssets($page));

        $authorizer->authorize($page);
        $breadcrumbs->make($page);
        $loader->load($page);

        $response->make($page);
        $http->cache($page);

        return $page->getResponse();
    }

    /**
     * Redirect elsewhere.
     *
     * @param PageRepositoryInterface $pages
     * @param Redirector              $redirector
     * @param Route                   $route
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect(PageRepositoryInterface $pages, Redirector $redirector, Route $route)
    {
        if ($to = array_get($route->getAction(), 'to')) {
            return $redirector->to($to, array_get($route->getAction(), 'status', 302));
        }

        if ($page = $pages->find(array_get($route->getAction(), 'page', 0))) {
            return $redirector->to($page->path(), array_get($route->getAction(), 'status', 302));
        }

        abort(404);
    }
}
