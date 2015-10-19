<?php namespace Anomaly\PagesModule\Page\Plugin\Command;

use Anomaly\PagesModule\Page\PageCollection;
use Anomaly\PagesModule\Page\PageModel;
use Anomaly\Streams\Platform\Support\Query;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetPages
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Plugin\Command
 */
class GetPages implements SelfHandling
{

    /**
     * The parameters.
     *
     * @var array
     */
    protected $parameters;

    /**
     * Create a new GetPages command.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    /**
     * Handle the command.
     *
     * @param Query $query
     * @return PageCollection
     * @throws \Exception
     */
    public function handle(Query $query)
    {
        $this->parameters['model'] = PageModel::class;

        array_set($this->parameters, 'order_by', array_get($this->parameters, 'order_by', ['sort_order', 'ASC']));

        $query = $query->build($this->parameters);

        if (array_has($this->parameters, 'enabled')) {
            $query->where('enabled', array_pull($this->parameters, 'enabled'));
        }

        if (array_has($this->parameters, 'visible')) {
            $query->where('visible', array_pull($this->parameters, 'visible'));
        }

        return $query->get();
    }
}
