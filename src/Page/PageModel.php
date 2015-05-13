<?php namespace Anomaly\PagesModule\Page;

use Anomaly\EditorFieldType\EditorFieldType;
use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Model\Pages\PagesPagesEntryModel;
use Illuminate\Database\Eloquent\Builder;

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
     * @return $this
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
     * Get the page content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
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

        return $css->getStoragePath();
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

        return $js->getStoragePath();
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
}
