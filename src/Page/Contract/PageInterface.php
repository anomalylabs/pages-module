<?php namespace Anomaly\PagesModule\Page\Contract;

use Anomaly\PagesModule\Page\PageCollection;
use Anomaly\PagesModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Model\EloquentCollection;
use Illuminate\Http\Response;

/**
 * Interface PageInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Contract
 */
interface PageInterface extends EntryInterface
{

    /**
     * Return the static prefix.
     *
     * @return string
     */
    public function staticPrefix();

    /**
     * Return the combined meta title.
     *
     * @return string
     */
    public function metaTitle();

    /**
     * Return the combined meta keywords.
     *
     * @return string
     */
    public function metaKeywords();

    /**
     * Return the combined meta description.
     *
     * @return string
     */
    public function metaDescription();

    /**
     * Get the string ID.
     *
     * @return string
     */
    public function getStrId();

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
     * Get the path to the page's type layout.
     *
     * @return string
     */
    public function getLayoutViewPath();

    /**
     * Get the live flag.
     *
     * @return bool
     */
    public function isLive();

    /**
     * Get the home flag.
     *
     * @return bool
     */
    public function isHome();

    /**
     * Get the related parent page.
     *
     * @return null|PageInterface
     */
    public function getParent();

    /**
     * Get the related children pages.
     *
     * @return PageCollection
     */
    public function getChildren();

    /**
     * Get the related roles allowed.
     *
     * @return EloquentCollection
     */
    public function getAllowedRoles();

    /**
     * Get the route suffix.
     *
     * @param null $prefix
     * @return null|string
     */
    public function getRouteSuffix($prefix = null);

    /**
     * Get the route constraints.
     *
     * @return null|string
     */
    public function getRouteConstraints();

    /**
     * Get the additional parameters.
     *
     * @return null|string
     */
    public function getAdditionalParameters();

    /**
     * Get the related page type.
     *
     * @return null|TypeInterface
     */
    public function getType();

    /**
     * Get the page handler.
     *
     * @return PageHandlerExtension
     */
    public function getPageHandler();

    /**
     * Get the related entry.
     *
     * @return null|EntryInterface
     */
    public function getEntry();

    /**
     * Get the related entry ID.
     *
     * @return null|int
     */
    public function getEntryId();

    /**
     * Get the content.
     *
     * @return null|string
     */
    public function getContent();

    /**
     * Set the content.
     *
     * @param $content
     * @return $this
     */
    public function setContent($content);

    /**
     * Get the response.
     *
     * @return Response|null
     */
    public function getResponse();

    /**
     * Set the response.
     *
     * @param $response
     * @return $this
     */
    public function setResponse(Response $response);
}
