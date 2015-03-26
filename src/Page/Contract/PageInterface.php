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
     * Get the ID.
     *
     * @return integer
     */
    public function getId();

    /**
     * Get the path.
     *
     * @return string
     */
    public function getPath();

    /**
     * Get the title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Get the page content.
     *
     * @return string
     */
    public function getContent();
}
