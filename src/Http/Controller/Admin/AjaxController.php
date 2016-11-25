<?php namespace Anomaly\PagesModule\Http\Controller\Admin;

use Anomaly\PagesModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeCollection;
use Anomaly\Streams\Platform\Field\Contract\FieldRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class AjaxController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AjaxController extends AdminController
{

    /**
     * Return the modal for choosing a page type.
     *
     * @param  TypeRepositoryInterface $types
     * @return \Illuminate\View\View
     */
    public function chooseType(TypeRepositoryInterface $types)
    {
        return view('module::admin/pages/choose', ['types' => $types->all()]);
    }

    /**
     * Return the modal for choosing a field type.
     *
     * @param  FieldTypeCollection   $fieldTypes
     * @return \Illuminate\View\View
     */
    public function chooseFieldType(FieldTypeCollection $fieldTypes)
    {
        $url = $_SERVER['HTTP_REFERER'];

        return view('module::admin/fields/choose', ['field_types' => $fieldTypes->all(), 'url' => $url]);
    }

    /**
     * Return the modal for choosing a field to assign.
     *
     * @param  FieldRepositoryInterface $fields
     * @return \Illuminate\View\View
     */
    public function chooseField(FieldRepositoryInterface $fields, TypeRepositoryInterface $types, $id)
    {
        $type = $types->find($id);

        return view(
            'module::admin/types/choose',
            [
                'fields' => $fields->findAllByNamespace('pages')->notAssignedTo($type->getEntryStream())->unlocked(),
                'id'     => $id,
            ]
        );
    }
}
