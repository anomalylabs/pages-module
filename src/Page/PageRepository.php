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
     * Create a new PageRepositoryInterface instance.
     *
     * @param PageModel $model
     */
    public function __construct(PageModel $model)
    {
        $this->model = $model;
    }

    /**
     * Return the first page.
     *
     * @return PageInterface
     */
    public function first()
    {
        return $this->model->ordered()->first();
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
}
