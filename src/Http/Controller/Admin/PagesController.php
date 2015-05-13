<?php namespace Anomaly\PagesModule\Http\Controller\Admin;

use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\PagesModule\Page\Form\Command\AddEntryForm;
use Anomaly\PagesModule\Page\Form\Command\AddPageForm;
use Anomaly\PagesModule\Page\Form\PageEntryFormBuilder;
use Anomaly\PagesModule\Page\Tree\PageTreeBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Support\Authorizer;
use Illuminate\Http\Request;
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
     * Return the form for a new page.
     *
     * @param PageEntryFormBuilder $form
     * @param Request              $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(PageEntryFormBuilder $form)
    {
        $this->dispatch(new AddEntryForm($form));
        $this->dispatch(new AddPageForm($form));

        return $form->render();
    }

    /**
     * Return a form for an existing page.
     *
     * @param PageEntryFormBuilder $form
     * @param                      $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(PageEntryFormBuilder $form, $id)
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

        // Redirect to home if this is the first page.
        if ($first && $first->getId() === $page->getId()) {
            return $redirector->to('/');
        }

        return $redirector->to($page->path());
    }

    /**
     * Delete a page and go back.
     *
     * @param PageRepositoryInterface $pages
     * @param Authorizer              $authorizer
     * @param                         $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(PageRepositoryInterface $pages, Authorizer $authorizer, $id)
    {
        $authorizer->authorize('anomaly.module.pages::pages.delete');
        
        $pages->delete($pages->find($id));

        return redirect()->back();
    }
}
