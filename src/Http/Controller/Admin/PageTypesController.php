<?php namespace Anomaly\PagesModule\Http\Controller\Admin;

use Anomaly\PagesModule\Type\Contract\PageTypeRepositoryInterface;
use Anomaly\PagesModule\Type\Form\PageTypeFormBuilder;
use Anomaly\PagesModule\Type\Table\PageTypeTableBuilder;
use Anomaly\Streams\Platform\Assignment\Form\AssignmentFormBuilder;
use Anomaly\Streams\Platform\Assignment\Table\AssignmentTableBuilder;
use Anomaly\Streams\Platform\Field\Form\FieldFormBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;
use Illuminate\Http\Request;

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
     * Return a table of existing page type assignments.
     *
     * @param AssignmentTableBuilder      $table
     * @param StreamRepositoryInterface   $streams
     * @param PageTypeRepositoryInterface $types
     * @param BreadcrumbCollection        $breadcrumbs
     * @param Request                     $request
     * @param                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function fields(
        AssignmentTableBuilder $table,
        StreamRepositoryInterface $streams,
        PageTypeRepositoryInterface $types,
        BreadcrumbCollection $breadcrumbs,
        Request $request,
        $id
    ) {
        $type = $types->find($id);

        $breadcrumbs->put($type->getName(), 'admin/pages/types/fields/'.$type->getId());
        $breadcrumbs->put('module::breadcrumb.fields', 'admin/pages/types/fields/'.$type->getId());

        return $table->setButtons(
            [
                'edit' => [
                    'href' => '{request.path}/edit/{entry.id}'
                ]
            ]
        )->setStream($streams->findBySlugAndNamespace($type->getSlug(), 'pages'))->render();
    }

    /**
     * Return a form for a new page type field and assignment.
     *
     * @param FieldFormBuilder            $form
     * @param StreamRepositoryInterface   $streams
     * @param PageTypeRepositoryInterface $types
     * @param BreadcrumbCollection        $breadcrumbs
     * @param Request                     $request
     * @param                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createField(
        FieldFormBuilder $form,
        StreamRepositoryInterface $streams,
        PageTypeRepositoryInterface $types,
        BreadcrumbCollection $breadcrumbs,
        Request $request,
        $id
    ) {
        $type = $types->find($id);

        $breadcrumbs->put($type->getName(), 'admin/pages/types/fields/'.$type->getId());
        $breadcrumbs->put('module::breadcrumb.fields', 'admin/pages/types/fields/'.$type->getId());

        return $form->setOption('auto_assign', true)->setStream(
            $streams->findBySlugAndNamespace($type->getSlug(), 'pages')
        )->render();
    }

    /**
     * Return a form for an existing page type field and assignment.
     *
     * @param AssignmentFormBuilder       $form
     * @param StreamRepositoryInterface   $streams
     * @param PageTypeRepositoryInterface $types
     * @param BreadcrumbCollection        $breadcrumbs
     * @param Request                     $request
     * @param                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editField(
        AssignmentFormBuilder $form,
        StreamRepositoryInterface $streams,
        PageTypeRepositoryInterface $types,
        BreadcrumbCollection $breadcrumbs,
        Request $request,
        $id,
        $assignment
    ) {
        $type = $types->find($id);

        $breadcrumbs->put($type->getName(), 'admin/pages/types/fields/'.$type->getId());
        $breadcrumbs->put('module::breadcrumb.fields', 'admin/pages/types/fields/'.$type->getId());

        return $form->setStream(
            $streams->findBySlugAndNamespace($type->getSlug(), 'pages')
        )->render($assignment);
    }
}
