<?php namespace Anomaly\PagesModule\Http\Controller\Admin;

use Anomaly\PagesModule\Entry\Form\EntryFormBuilder;
use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\PagesModule\Page\Form\PageEntryFormBuilder;
use Anomaly\PagesModule\Page\Form\PageFormBuilder;
use Anomaly\PagesModule\Page\Tree\PageTreeBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Model\Pages\PagesTheBestKindEntryModel;
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
    public function create(PageFormBuilder $page, EntryFormBuilder $entry, PageEntryFormBuilder $form)
    {
        $entry->setModel(new PagesTheBestKindEntryModel());

        return $form->addForm('page', $page)->addForm('entry', $entry)->render();
    }

    /**
     * Return a form for an existing page.
     *
     * @param PageFormBuilder $form
     * @param                 $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(PageFormBuilder $page, EntryFormBuilder $entry, PageEntryFormBuilder $form, $id)
    {
        $page->setEntry($id);
        
        $entry->setModel(new PagesTheBestKindEntryModel())->setEntry(1);

        return $form->addForm('page', $page)->addForm('entry', $entry)->render();
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
