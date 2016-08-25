<?php namespace Anomaly\PagesModule\Http\Controller\Admin;

use Anomaly\PagesModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\PagesModule\Type\Form\TypeFormBuilder;
use Anomaly\PagesModule\Type\Table\TypeTableBuilder;
use Anomaly\Streams\Platform\Assignment\Form\AssignmentFormBuilder;
use Anomaly\Streams\Platform\Assignment\Table\AssignmentTableBuilder;
use Anomaly\Streams\Platform\Field\Contract\FieldRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;

/**
 * Class TypesController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class TypesController extends AdminController
{

    /**
     * Return an index of existing page types.
     *
     * @param  TypeTableBuilder                           $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(TypeTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return a form for a new page type.
     *
     * @param  TypeFormBuilder                            $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(TypeFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return a form for editing an existing page type.
     *
     * @param  TypeFormBuilder                            $form
     * @param                                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(TypeFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * Return a table of existing page type assignments.
     *
     * @param  AssignmentTableBuilder                     $table
     * @param  TypeRepositoryInterface                    $types
     * @param  BreadcrumbCollection                       $breadcrumbs
     * @param                                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function fields(
        AssignmentTableBuilder $table,
        TypeRepositoryInterface $types,
        BreadcrumbCollection $breadcrumbs,
        $id
    ) {
        $type = $types->find($id);

        return $table
            ->setButtons(
                [
                    'edit' => [
                        'href' => '{request.path}/assignment/{entry.id}',
                    ],
                ]
            )
            ->setStream($type->getEntryStream())
            ->render();
    }

    public function assign(
        AssignmentFormBuilder $form,
        TypeRepositoryInterface $types,
        StreamRepositoryInterface $streams,
        FieldRepositoryInterface $fields,
        $id,
        $field
    ) {
        $type = $types->find($id);

        return $form
            ->setStream($type->getEntryStream())
            ->setField($fields->find($field))
            ->render();
    }

    /**
     * Return a form for an existing page type field and assignment.
     *
     * @param  AssignmentFormBuilder                      $form
     * @param  StreamRepositoryInterface                  $streams
     * @param  TypeRepositoryInterface                    $types
     * @param  BreadcrumbCollection                       $breadcrumbs
     * @param                                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function assignment(
        AssignmentFormBuilder $form,
        StreamRepositoryInterface $streams,
        TypeRepositoryInterface $types,
        BreadcrumbCollection $breadcrumbs,
        $id,
        $assignment
    ) {
        $type = $types->find($id);

        $breadcrumbs->put('streams::breadcrumb.assignments', 'admin/pages/types/assignments/' . $type->getId());

        return $form->render($assignment);
    }
}
