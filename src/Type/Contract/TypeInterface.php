<?php namespace Anomaly\PagesModule\Type\Contract;

use Anomaly\PagesModule\Page\Handler\Contract\PageHandlerInterface;
use Anomaly\PagesModule\Page\PageCollection;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;

/**
 * Interface TypeInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Type\Contract
 */
interface TypeInterface extends EntryInterface
{

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Get the meta title.
     *
     * @return string
     */
    public function getMetaTitle();

    /**
     * Get the meta keywords.
     *
     * @return array
     */
    public function getMetaKeywords();

    /**
     * Get the meta description.
     *
     * @return string
     */
    public function getMetaDescription();

    /**
     * Get the related entry stream.
     *
     * @return StreamInterface
     */
    public function getEntryStream();

    /**
     * Get the related entry model name.
     *
     * @return string
     */
    public function getEntryModelName();

    /**
     * Get the page handler.
     *
     * @return PageHandlerInterface
     */
    public function getPageHandler();

    /**
     * Get the related pages.
     *
     * @return PageCollection
     */
    public function getPages();
}
