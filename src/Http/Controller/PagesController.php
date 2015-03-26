<?php namespace Anomaly\PagesModule\Http\Controller;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;

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
     * Handle the page.
     *
     * @param PageInterface $page
     * @return \Illuminate\View\View
     */
    public function handle(PageInterface $page)
    {
        return view('anomaly.module.pages::page', compact('page'));
    }
}
