<?php namespace Anomaly\PagesModule\Http\Controller\Admin;

use Anomaly\PagesModule\Type\Field\Form\PageTypeFieldFormBuilder;
use Anomaly\PagesModule\Type\Field\Table\PageTypeFieldTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class FieldsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Http\Controller\Admin
 */
class FieldsController extends AdminController
{

    /**
     * Return an index of existing page type fields.
     *
     * @param PageTypeFieldTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(PageTypeFieldTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return a form for a new field.
     *
     * @param PageTypeFieldFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(PageTypeFieldFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return a form for an existing field.
     *
     * @param PageTypeFieldFormBuilder $form
     * @param                          $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(PageTypeFieldFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
