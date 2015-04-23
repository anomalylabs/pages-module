<?php namespace Anomaly\PagesModule\Http\Controller;

use Anomaly\PagesModule\Page\Command\GetPageResponse;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
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
     * Map the matched route action to a page response.
     *
     * @param string $method
     * @param array  $parameters
     * @return Response
     */
    public function __call($method, $parameters)
    {
        return $this->dispatch(new GetPageResponse(substr($method, strpos($method, '_') + 1)));
    }
}
