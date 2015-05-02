<?php namespace Anomaly\PagesModule\Http\Controller\Admin;

use Anomaly\PagesModule\Type\Contract\PageTypeRepositoryInterface;
use Anomaly\PagesModule\Type\Form\PageTypeFormBuilder;
use Anomaly\PagesModule\Type\Table\PageTypeTableBuilder;
use Anomaly\Streams\Platform\Assignment\Form\AssignmentFormBuilder;
use Anomaly\Streams\Platform\Assignment\Table\AssignmentTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class PageTypesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Http\Controller\Admin
 */
class PageTypesController extends AdminController
{

    /**
     * Return an index of existing page types.
     *
     * @param PageTypeTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(PageTypeTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return a form for a new page type.
     *
     * @param PageTypeFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(PageTypeFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return a form for editing an existing page type.
     *
     * @param PageTypeFormBuilder $form
     * @param                     $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(PageTypeFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    public function fields(AssignmentTableBuilder $table, PageTypeRepositoryInterface $types, $id)
    {
        $type = $types->find($id);

        return $table->setStream($type->getStream())->render();
    }

    public function add(AssignmentFormBuilder $form, PageTypeRepositoryInterface $types, $id)
    {
        $type = $types->find($id);

        return $form->setStream($type->getStream())->render();
    }
}
