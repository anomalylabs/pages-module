<?php namespace Anomaly\PagesModule\Page;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\Streams\Platform\Support\Authorizer;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Auth\Guard;

/**
 * Class PageAuthorizer
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page
 */
class PageAuthorizer
{

    /**
     * The authorization utility.
     *
     * @var Guard
     */
    protected $guard;

    /**
     * The authorizer utility.
     *
     * @var Authorizer
     */
    protected $authorizer;

    /**
     * Create a new PageAuthorizer instance.
     *
     * @param Guard      $guard
     * @param Authorizer $authorizer
     */
    public function __construct(Guard $guard, Authorizer $authorizer)
    {
        $this->guard      = $guard;
        $this->authorizer = $authorizer;
    }

    /**
     * Authorize the page.
     *
     * @param PageInterface $page
     */
    public function authorize(PageInterface $page)
    {
        /* @var UserInterface $user */
        $user = $this->guard->user();

        /**
         * If the page is not enabled and we
         * are not logged in then 404.
         */
        if (!$page->isEnabled() && !$user) {
            abort(404);
        }

        /**
         * If the page is not enabled and we are
         * logged in then make sure we have permission.
         */
        if (!$page->isEnabled()) {
            $this->authorizer->authorize('anomaly.module.pages::view_drafts');
        }

        /**
         * If the page is restricted to specific
         * roles then make sure our user is one of them.
         */
        /*if ((!$user && $page->getAllowedRoles()) || !$user->hasAnyRole($page->getAllowedRoles())) {
            abort(403);
        }*/
    }
}
