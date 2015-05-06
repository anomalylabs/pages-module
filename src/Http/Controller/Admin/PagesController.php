<?php namespace Anomaly\PagesModule\Http\Controller\Admin;

use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\PagesModule\Page\Form\PageFormBuilder;
use Anomaly\PagesModule\Page\Tree\PageTreeBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

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
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function create(PageRepositoryInterface $pages, PageFormBuilder $form, $path = null)
    {
        if ($path && $page = $pages->findByPath($path)) {
            $form->setParent($page);
        }

        return $form->render();
    }

    /**
     * Return a form for an existing page.
     *
     * @param PageFormBuilder $form
     * @param                 $id
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(PageFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
