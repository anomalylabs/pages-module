<?php namespace Anomaly\PagesModule\Http\Controller;

use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\PagesModule\Page\Handler\Contract\PageHandlerResponseInterface;
use Anomaly\PagesModule\Page\PageResolver;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Container\Container;
use Symfony\Component\HttpFoundation\Response;

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
     * @return Response
     */
    public function view(PageResolver $resolver, Container $container)
    {
        if (!$page = $resolver->resolve()) {
            abort(404);
        }

        return $container->call(substr(get_class($page->getPageHandler()), 0, -9) . 'Response@make', compact('page'));
    }

    /**
     * @param PageRepositoryInterface $pages
     * @param Container               $container
     * @param                         $id
     * @return Response
     */
    public function preview(PageRepositoryInterface $pages, Container $container, $id)
    {
        if (!$page = $pages->findByStrId($id)) {
            abort(404);
        }

        $page->live = true;

        return $container->call(substr(get_class($page->getPageHandler()), 0, -9) . 'Response@make', compact('page'));
    }
}
