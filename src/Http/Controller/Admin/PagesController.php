<?php namespace Anomaly\PagesModule\Http\Controller\Admin;

use Anomaly\PagesModule\Entry\Form\EntryFormBuilder;
use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\PagesModule\Page\Form\PageEntryFormBuilder;
use Anomaly\PagesModule\Page\Form\PageFormBuilder;
use Anomaly\PagesModule\Page\Tree\PageTreeBuilder;
use Anomaly\PagesModule\Type\Command\GetTypeStream;
use Anomaly\PagesModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;
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
     * Return a form for a new page.
     *
     * @param PageFormBuilder             $page
     * @param EntryFormBuilder            $entry
     * @param PageEntryFormBuilder        $form
     * @param TypeRepositoryInterface $types
     * @param Request                     $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(
        PageFormBuilder $page,
        EntryFormBuilder $entry,
        PageEntryFormBuilder $form,
        TypeRepositoryInterface $types,
        Request $request
    ) {
        /* @var StreamInterface $stream */
        $stream = $this->dispatch(new GetTypeStream($type = $types->find($request->get('type'))));

        $entry->setModel($stream->getEntryModelName());

        return $form->setType($type)->addForm('entry', $entry)->addForm('page', $page)->render();
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
