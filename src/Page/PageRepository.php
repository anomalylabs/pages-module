<?php namespace Anomaly\PagesModule\Page;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\Streams\Platform\Model\EloquentModel;

/**
 * Class PageRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page
 */
class PageRepository implements PageRepositoryInterface
{

    /**
     * The page model.
     *
     * @var PageModel
     */
    protected $model;

    /**
     * Create a new PageRepositoryInterface instance.
     *
     * @param PageModel $model
     */
    public function __construct(PageModel $model)
    {
        $this->model = $model;
    }

    /**
     * Return all pages.
     *
     * @return PageCollection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find a page by ID.
     *
     * @param $id
     * @return null|PageInterface
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Find a page by it's path.
     *
     * @param $path
     * @return null|PageInterface
     */
    public function findByPath($path)
    {
        return $this->model->where('home', false)->where('path', $path)->first();
    }

    /**
     * Save a page.
     *
     * @param PageInterface|EloquentModel $page
     * @return PageInterface
     */
    public function save(PageInterface $page)
    {
        return $page->save();
    }

    /**
     * Delete a page.
     *
     * @param PageInterface|EloquentModel $page
     * @return bool
     */
    public function delete(PageInterface $page)
    {
        return $page->delete();
    }
}
