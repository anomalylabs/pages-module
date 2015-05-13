<?php namespace Anomaly\PagesModule\Type\Contract;

/**
 * Interface TypeInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Type\Contract
 */
interface TypeInterface
{

    /**
     * Get the ID.
     *
     * @return int
     */
    public function getId();

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();

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
}
