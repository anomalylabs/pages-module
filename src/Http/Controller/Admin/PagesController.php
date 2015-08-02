<?php namespace Anomaly\PagesModule\Http\Controller\Admin;

use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\PagesModule\Page\Form\Command\AddEntryFormFromPage;
use Anomaly\PagesModule\Page\Form\Command\AddEntryFormFromRequest;
use Anomaly\PagesModule\Page\Form\Command\AddPageFormFromPage;
use Anomaly\PagesModule\Page\Form\Command\AddPageFormFromRequest;
use Anomaly\PagesModule\Page\Form\PageEntryFormBuilder;
use Anomaly\PagesModule\Page\Tree\PageTreeBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Support\Authorizer;

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
     * Return the form for creating a new page.
     *
     * @param PageEntryFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(PageEntryFormBuilder $form)
    {
        $this->dispatch(new AddEntryFormFromRequest($form));
        $this->dispatch(new AddPageFormFromRequest($form));

        return $form->render();
    }

    /**
     * Return the form for editing an existing page.
     *
     * @param PageRepositoryInterface $pages
     * @param PageEntryFormBuilder    $form
     * @param                         $id
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

        $pages->delete($page = $pages->find($id));
        $page->entry->delete();

        return redirect()->back();
    }
}
