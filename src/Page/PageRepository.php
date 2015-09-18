<?php namespace Anomaly\PagesModule\Page;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

/**
 * Class PageRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page
 */
class PageRepository extends EntryRepository implements PageRepositoryInterface
{

    /**
     * The page model.
     *
     * @var PageModel
     */
    protected $model;

    /**
     * The page collection.
     *
     * @var PageCollection
     */
    protected $pages;

    /**
     * Create a new PageRepositoryInterface instance.
     *
     * @param PageModel $model
     */
    public function __construct(PageModel $model)
    {
        $this->model = $model;

        $this->pages = $this->model->ordered()->get();
    }

    /**
     * Return all pages.
     *
     * @return PageCollection
     */
    public function all()
    {
        return $this->pages;
    }

    /**
     * Find a page by it's string ID.
     *
     * @param $id
     * @return null|PageInterface
     */
    public function findByStrId($id)
    {
        return $this->model->where('str_id', $id)->first();
    }
}
