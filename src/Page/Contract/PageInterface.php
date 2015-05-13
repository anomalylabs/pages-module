<?php namespace Anomaly\PagesModule\Page\Contract;

use Anomaly\PagesModule\Page\PageCollection;
use Anomaly\PagesModule\Type\Contract\TypeInterface;

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
     * Return the path.
     *
     * @param null $path
     * @return $this
     */
    public function path($path = null);

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
     * @return null|TypeInterface
     */
    public function getType();
}
