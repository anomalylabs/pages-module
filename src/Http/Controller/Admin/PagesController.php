<?php namespace Anomaly\PagesModule\Http\Controller\Admin;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\PagesModule\Page\Form\Command\AddEntryFormFromPage;
use Anomaly\PagesModule\Page\Form\Command\AddEntryFormFromRequest;
use Anomaly\PagesModule\Page\Form\Command\AddPageFormFromPage;
use Anomaly\PagesModule\Page\Form\Command\AddPageFormFromRequest;
use Anomaly\PagesModule\Page\Form\PageEntryFormBuilder;
use Anomaly\PagesModule\Page\Form\PageFormBuilder;
use Anomaly\PagesModule\Page\Tree\PageTreeBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Support\Authorizer;
use Illuminate\Routing\Redirector;

/**
 * Class PagesController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class PagesController extends AdminController
{

    /**
     * Return a tree of existing pages.
     *
     * @param  PageTreeBuilder $tree
     * @return \Illuminate\Http\Response
     */
    public function index(PageTreeBuilder $tree)
    {
        return $tree->render();
    }

    /**
     * Return the form for creating a new page.
     *
     * @param  PageEntryFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(PageEntryFormBuilder $form, PageRepositoryInterface $pages)
    {
        $this->dispatch(new AddEntryFormFromRequest($form));
        $this->dispatch(new AddPageFormFromRequest($form));

        if ($parent = $this->request->get('parent')) {

            /* @var PageFormBuilder $pageForm */
            $pageForm = $form->getChildForm('page');

            $pageForm->setParent($pages->find($parent));
        }

        return $form->render();
    }

    /**
     * Return the form for editing an existing page.
     *
     * @param  PageRepositoryInterface                    $pages
     * @param  PageEntryFormBuilder                       $form
     * @param                                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(PageRepositoryInterface $pages, PageEntryFormBuilder $form, $id)
    {
        $page = $pages->find($id);

        $this->dispatch(new AddEntryFormFromPage($form, $page));
        $this->dispatch(new AddPageFormFromPage($form, $page));

        return $form->render($id);
    }

    /**
     * Redirect to a page's URL.
     *
     * @param  PageRepositoryInterface           $pages
     * @param  Redirector                        $redirect
     * @param                                    $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function view(PageRepositoryInterface $pages, Redirector $redirect, $id)
    {
        /* @var PageInterface $page */
        $page = $pages->find($id);

        if (!$page->isEnabled()) {
            return $redirect->to('pages/preview/' . $page->getStrId());
        }

        if ($page->isHome()) {
            return $redirect->to('/');
        }

        return $redirect->to($page->getPath());
    }

    /**
     * Delete a page and go back.
     *
     * @param  PageRepositoryInterface           $pages
     * @param  Authorizer                        $authorizer
     * @param                                    $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(PageRepositoryInterface $pages, Authorizer $authorizer, $id)
    {
        if (!$authorizer->authorize('anomaly.module.pages::pages.delete')) {

            $this->messages->error('streams::message.access_denied');

            return $this->redirect->back();
        }

        $pages->delete($page = $pages->find($id));

        $page->entry->delete();

        return redirect()->back();
    }
}
