<?php namespace Anomaly\PagesModule\Type;

use Anomaly\PagesModule\Type\Contract\PageTypeInterface;
use Anomaly\PagesModule\Type\Contract\PageTypeRepositoryInterface;

/**
 * Class PageTypeRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Type
 */
class PageTypeRepository implements PageTypeRepositoryInterface
{

    /**
     * The page type model.
     *
     * @var PageTypeModel
     */
    protected $model;

    /**
     * Create a new PageTypeRepository instance.
     *
     * @param PageTypeModel $model
     */
    public function __construct(PageTypeModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find a page type by ID.
     *
     * @param $id
     * @return null|PageTypeInterface
     */
    public function find($id)
    {
        return $this->model->find($id);
    }
}
