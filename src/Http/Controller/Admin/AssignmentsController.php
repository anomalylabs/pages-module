<?php namespace Anomaly\PagesModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Support\Authorizer;

/**
 * Class AssignmentsController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AssignmentsController extends \Anomaly\Streams\Platform\Http\Controller\AssignmentsController
{

    /**
     * The stream namespace.
     *
     * @var string
     */
    protected $namespace = 'pages';

    /**
     * Create a new AssignmentsController instance.
     *
     * @param Authorizer $authorizer
     */
    public function __construct(Authorizer $authorizer)
    {
        parent::__construct();

        $this->middleware(
            function ($request, $next) use ($authorizer) {
                if (!$authorizer->authorize('anomaly.module.pages::types.fields')) {
                    abort(403);
                }

                return $next($request);
            }
        );
    }
}
