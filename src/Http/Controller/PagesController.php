<?php namespace Anomaly\PagesModule\Http\Controller;

use Anomaly\PagesModule\Page\PageAuthorizer;
use Anomaly\PagesModule\Page\PageHttp;
use Anomaly\PagesModule\Page\PageLoader;
use Anomaly\PagesModule\Page\PageResolver;
use Anomaly\PagesModule\Page\PageResponse;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
     * The page HTTP modifier.
     *
     * @var PageHttp
     */
    protected $http;

    /**
     * The page loader.
     *
     * @var PageLoader
     */
    protected $loader;

    /**
     * The page resolver.
     *
     * @var PageResolver
     */
    protected $resolver;

    /**
     * The page responder.
     *
     * @var PageResponse
     */
    protected $response;

    /**
     * The page authorizer.
     *
     * @var PageAuthorizer
     */
    protected $authorizer;

    /**
     * Create a new PagesController instance.
     *
     * @param PageHttp       $http
     * @param PageLoader     $loader
     * @param PageResolver   $resolver
     * @param PageResponse   $response
     * @param PageAuthorizer $authorizer
     */
    public function __construct(
        PageHttp $http,
        PageLoader $loader,
        PageResolver $resolver,
        PageResponse $response,
        PageAuthorizer $authorizer
    ) {
        $this->http       = $http;
        $this->loader     = $loader;
        $this->resolver   = $resolver;
        $this->response   = $response;
        $this->authorizer = $authorizer;
    }

    /**
     * View a page.
     *
     * @return Response
     */
    public function view()
    {
        if (!$page = $this->resolver->resolve()) {
            abort(404);
        }

        $this->authorizer->authorize($page);
        $this->loader->load($page);
        $this->response->make($page);
        $this->http->cache($page);

        return $page->getResponse();
    }
}
