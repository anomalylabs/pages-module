<?php namespace Anomaly\PagesModule\Http\Controller;

use Anomaly\PagesModule\Page\Command\GetPageResponse;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
    public function view(Request $request)
    {
        $action = $request->route()->getAction();

        return $this->dispatch(new GetPageResponse($action['id']));
    }
}
