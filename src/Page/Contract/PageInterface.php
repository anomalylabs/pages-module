<?php namespace Anomaly\PagesModule\Page\Contract;

use Anomaly\PagesModule\Page\PageCollection;
use Anomaly\PagesModule\Type\Contract\PageTypeInterface;

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
     * Get the TTL.
     *
     * @return null|int
     */
    public function getTtl();

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Set the path.
     *
     * @param $path
     * @return $this
     */
    public function setPath($path);

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

    /**
     * Return the related parent page.
     *
     * @return null|PageInterface
     */
    public function getParent();

    /**
     * Return the related children pages.
     *
     * @return PageCollection
     */
    public function getChildren();

    /**
     * Get the CSS path.
     *
     * @return string
     */
    public function getCssPath();

    /**
     * Get the JS path.
     *
     * @return string
     */
    public function getJsPath();

    /**
     * Get the page type.
     *
     * @return null|PageTypeInterface
     */
    public function getType();
}
