<?php namespace Anomaly\PagesModule\Http\Controller;

use Anomaly\PagesModule\Page\Handler\Contract\PageHandlerResponseInterface;
use Anomaly\PagesModule\Page\PageResolver;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Container\Container;

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
}
