<?php namespace Anomaly\PagesModule\Page\Handler;

use Anomaly\Streams\Platform\Addon\Extension\Extension;

/**
 * Class PageHandlerExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Handler
 */
class PageHandlerExtension extends Extension
{

    /**
     * The response class name.
     *
     * @var null
     */
    protected $response = null;

    /**
     * Return the response class name.
     *
     * @return null|string
     */
    public function getResponse()
    {
        if (!$this->response) {
            return substr(get_class($this), 0, -9) . 'Response';
        }

        return $this->response;
    }
}
