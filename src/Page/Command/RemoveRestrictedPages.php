<?php namespace Anomaly\PagesModule\Page\Command;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\PageCollection;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class RemoveRestrictedPages
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class RemoveRestrictedPages
{

    /**
     * The page collection.
     *
     * @var PageCollection
     */
    protected $pages;

    /**
     * Create a new RemoveRestrictedPages instance.
     *
     * @param PageCollection $pages
     */
    public function __construct(PageCollection $pages)
    {
        $this->pages = $pages;
    }

    /**
     * Handle the command.
     *
     * @param  Guard $auth
     * @return PageCollection
     */
    public function handle(Guard $auth)
    {
        /* @var UserInterface|null $user */
        $user = $auth->user();

        /* @var PageInterface $page */
        foreach ($this->pages as $key => $page) {

            $roles = $page->getAllowedRoles();

            /*
             * No restrictions means
             * anyone can see it.
             */
            if ($roles->isEmpty()) {
                continue;
            }

            /*
             * Admin's can see
             * absolutely everything.
             */
            if ($user && $user->isAdmin()) {
                continue;
            }

            // Pull out the guest role by slug.
            $guest = $roles->findBy('slug', 'guest');

            /*
             * An anonymous visitor is judged as
             * the guest role: show the page when
             * guest is a permitted audience,
             * otherwise hide it.
             */
            if (!$user) {

                if (!$guest) {
                    $this->pages->forget($key);
                }

                continue;
            }

            /*
             * A signed in user needs one of the
             * listed roles. The guest role is one
             * permitted audience and excludes no one.
             */
            if (!$user->hasAnyRole($roles)) {

                $this->pages->forget($key);

                continue;
            }
        }

        return $this->pages;
    }
}
