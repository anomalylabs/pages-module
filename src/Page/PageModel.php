<?php namespace Anomaly\PagesModule\Page;

use Anomaly\EditorFieldType\EditorFieldType;
use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Model\Pages\PagesPagesEntryModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Response;

/**
 * Class PageModel
 *
 * @method        Builder ordered()
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page
 */
class PageModel extends PagesPagesEntryModel implements PageInterface
{

    /**
     * The cache minutes.
     *
     * @var int
     */
    protected $cacheMinutes = 99999;

    /**
     * Always eager load these.
     *
     * @var array
     */
    protected $with = [
        'type'
    ];

    /**
     * The page's response.
     *
     * @var null|Response
     */
    protected $response = null;

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        self::observe(app(substr(__CLASS__, 0, -5) . 'Observer'));

        parent::boot();
    }

    /**
     * Order the pages.
     *
     * @param Builder $query
     * @return $this
     */
    public function scopeOrdered(Builder $query)
    {
        return $query->orderBy('parent_id', 'ASC')->orderBy('sort_order', 'ASC');
    }

    /**
     * Return the path.
     *
     * @param null $path
     * @return string
     */
    public function path($path = null)
    {
        $path = $this->getSlug();

        if ($parent = $this->getParent()) {
            $path = $parent->path($path) . '/' . $path;
        } elseif ($this->sort_order == 1) {
            return $path;
        }

        return $path;
    }

    /**
     * Return the combined meta title.
     *
     * @return string
     */
    public function metaTitle()
    {
        $metaTitle = $this->getMetaTitle();

        if (!$metaTitle && $type = $this->getType()) {
            $metaTitle = $type->getMetaTitle();
        }

        return $metaTitle;
    }

    /**
     * Return the combined meta keywords.
     *
     * @return string
     */
    public function metaKeywords()
    {
        $metaKeywords = $this->getMetaKeywords();

        if (!$metaKeywords && $type = $this->getType()) {
            $metaKeywords = $type->getMetaKeywords();
        }

        return $metaKeywords;
    }

    /**
     * Return the combined meta description.
     *
     * @return string
     */
    public function metaDescription()
    {
        $metaDescription = $this->getMetaDescription();

        if (!$metaDescription && $type = $this->getType()) {
            $metaDescription = $type->getMetaDescription();
        }

        return $metaDescription;
    }

    /**
     * Get the TTL.
     *
     * @return null|int
     */
    public function getTtl()
    {
        return $this->ttl;
    }

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the meta title.
     *
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->meta_title;
    }

    /**
     * Get the meta keywords.
     *
     * @return array
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
    }

    /**
     * Get the meta description.
     *
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * Get the enabled flag.
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Return the related parent page.
     *
     * @return null|PageInterface
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Return the related children pages.
     *
     * @return PageCollection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Return the children pages relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany('Anomaly\PagesModule\Page\PageModel', 'parent_id', 'id');
    }

    /**
     * Get the CSS path.
     *
     * @return string
     */
    public function getCssPath()
    {
        /* @var EditorFieldType $css */
        $css = $this->getFieldType('css');

        $css->setEntry($this);

        return $css->getAssetPath();
    }

    /**
     * Get the JS path.
     *
     * @return string
     */
    public function getJsPath()
    {
        /* @var EditorFieldType $js */
        $js = $this->getFieldType('js');

        $js->setEntry($this);

        return $js->getAssetPath();
    }

    /**
     * Get the page type.
     *
     * @return null|TypeInterface
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the related entry.
     *
     * @return null|EntryInterface
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * Get the related entry ID.
     *
     * @return null|int
     */
    public function getEntryId()
    {
        return $this->entry_id;
    }

    /**
     * Get the response.
     *
     * @return Response|null
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set the response.
     *
     * @param $response
     * @return $this
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;

        return $this;
    }
}
