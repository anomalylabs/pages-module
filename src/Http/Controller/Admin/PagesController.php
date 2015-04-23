<?php namespace Anomaly\PagesModule\Http\Controller\Admin;

use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\PagesModule\Page\Form\PageFormBuilder;
use Anomaly\PagesModule\Page\Table\PageTableBuilder;
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
     * Return an index of existing pages.
     *
     * @param PageRepositoryInterface $pages
     * @param PageTableBuilder        $table
     * @param null                    $path
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(PageRepositoryInterface $pages, PageTableBuilder $table, $path = null)
    {
        if ($page = $pages->findByPath($path)) {
            $table->setParent($page);
        }

        return $table->render();
    }

    /**
     * Return a form for a new page.
     *
     * @param PageFormBuilder $form
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
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
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(PageFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
