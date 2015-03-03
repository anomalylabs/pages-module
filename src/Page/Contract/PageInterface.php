<?php namespace Anomaly\PagesModule\Page\Contract;

/**
 * Interface PageInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Contract
 */
interface PageInterface
{

    /**
     * Get the path.
     *
     * @return string
     */
    public function getPath();
}
