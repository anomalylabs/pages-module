<?php namespace Anomaly\PagesModule\Http\Controller\Ajax;

use Anomaly\PagesModule\Type\Contract\PageTypeRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class TypesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Http\Controller\Ajax
 */
class TypesController extends AdminController
{

    public function choose(PageTypeRepositoryInterface $types)
    {
        return view('module::ajax/types/choose', ['types' => $types->all()]);
    }

}
