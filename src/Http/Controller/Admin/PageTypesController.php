<?php namespace Anomaly\PagesModule\Http\Controller\Admin;

use Anomaly\PagesModule\Type\Command\GetPageTypeStream;
use Anomaly\PagesModule\Type\Contract\PageTypeRepositoryInterface;
use Anomaly\PagesModule\Type\Form\PageTypeFormBuilder;
use Anomaly\PagesModule\Type\Table\PageTypeTableBuilder;
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

    /**
     * Return a table of assigned page type fields.
     *
     * @param AssignmentTableBuilder      $table
     * @param PageTypeRepositoryInterface $pageTypes
     * @param                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function fields(AssignmentTableBuilder $table, PageTypeRepositoryInterface $pageTypes, $id)
    {
        return $table->setStream($this->dispatch(new GetPageTypeStream($pageTypes->find($id))))->render();
    }
}
