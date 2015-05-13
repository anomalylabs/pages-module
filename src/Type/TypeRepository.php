<?php namespace Anomaly\PagesModule\Type;

use Anomaly\PagesModule\Type\Contract\TypeInterface;
use Anomaly\PagesModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Model\EloquentCollection;

/**
 * Class TypeRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Type
 */
class TypeRepository implements TypeRepositoryInterface
{

    /**
     * The page type model.
     *
     * @var TypeModel
     */
    protected $model;

    /**
     * Create a new TypeRepository instance.
     *
     * @param TypeModel $model
     */
    public function __construct(TypeModel $model)
    {
        $this->model = $model;
    }

    /**
     * Return all available page types.
     *
     * @return EloquentCollection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find a page type by ID.
     *
     * @param $id
     * @return null|TypeInterface
     */
    public function find($id)
    {
        return $this->model->find($id);
    }
}
