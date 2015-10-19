<?php namespace Anomaly\PagesModule\Type;

use Anomaly\PagesModule\Page\Handler\Contract\PageHandlerInterface;
use Anomaly\PagesModule\Page\PageCollection;
use Anomaly\PagesModule\Type\Command\GetTypeStream;
use Anomaly\PagesModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Model\Pages\PagesTypesEntryModel;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;

/**
 * Class TypeModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Type
 */
class TypeModel extends PagesTypesEntryModel implements TypeInterface
{

    /**
     * The cache minutes.
     *
     * @var int
     */
    protected $cacheMinutes = 99999;

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        self::observe(app(substr(__CLASS__, 0, -5) . 'Observer'));

        parent::boot();
    }

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * Get the description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
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
     * Get the related entry stream.
     *
     * @return StreamInterface
     */
    public function getEntryStream()
    {
        return $this->dispatch(new GetTypeStream($this));
    }

    /**
     * Get the related entry model name.
     *
     * @return string
     */
    public function getEntryModelName()
    {
        $stream = $this->getEntryStream();

        return $stream->getEntryModelName();
    }

    /**
     * Get the page handler.
     *
     * @return PageHandlerInterface
     */
    public function getPageHandler()
    {
        return $this->page_handler;
    }

    /**
     * Get the related pages.
     *
     * @return PageCollection
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Return the pages relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pages()
    {
        return $this->hasMany('Anomaly\PagesModule\Page\PageModel', 'type_id');
    }
}
