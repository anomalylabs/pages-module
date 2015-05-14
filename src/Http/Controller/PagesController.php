<?php namespace Anomaly\PagesModule\Http\Controller;

use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
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
     * View a page.
     *
     * @return Response
     */
    public function view(
        Route $route,
        Container $container,
        PageRepositoryInterface $pages,
        SettingRepositoryInterface $settings
    ) {
        $page = null;

        $action = $route->getAction();

        // Find by ID.
        if ($id = array_get($action, 'id')) {
            $page = $pages->find($id);
        }

        // Find by path.
        if ($path = array_get($action, 'path')) {
            $page = $pages->findByPath($path);
        }

        // Page not found.
        if (!$page) {
            abort(404);
        }

        $type    = $page->getType();
        $handler = $type->getHandler();

        $handler->setPage($page);

        /* @var Response $response */
        $response = $container->call([$handler, 'response'], compact('page'));

        return $response->setTtl($page->getTtl() ?: $settings->get('anomaly.module.pages::ttl'));
    }
}
