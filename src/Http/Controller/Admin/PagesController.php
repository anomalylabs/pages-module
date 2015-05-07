<?php namespace Anomaly\PagesModule\Http\Controller\Admin;

use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\PagesModule\Page\Form\PageFormBuilder;
use Anomaly\PagesModule\Page\Tree\PageTreeBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Illuminate\Routing\Redirector;

/**
 * Class PagesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Http\Controller\Admin
 */
class PagesController extends AdminController
{

    /**
     * Return a tree of existing pages.
     *
     * @param PageTreeBuilder $tree
     * @return \Illuminate\Http\Response
     */
    public function index(PageTreeBuilder $tree)
    {
        return $tree->render();
    }

    /**
     * Return a form for a new page.
     *
     * @param PageFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(PageFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return a form for an existing page.
     *
     * @param PageFormBuilder $form
     * @param                 $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(PageFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * Redirect to a page's URL.
     *
     * @param PageRepositoryInterface $pages
     * @param Redirector              $redirector
     * @param                         $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function view(PageRepositoryInterface $pages, Redirector $redirector, $id)
    {
        $first = $pages->first();
        $page  = $pages->find($id);

        if ($first && $first->getId() === $page->getId()) {
            return $redirector->to('/');
        }

        return $redirector->to($page->path());
    }
}
