<?php namespace Anomaly\PagesModule\Http\Controller\Admin;

use Anomaly\PagesModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeCollection;
use Anomaly\Streams\Platform\Field\Contract\FieldRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class AjaxController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Http\Controller\Admin
 */
class AjaxController extends AdminController
{

    /**
     * Return the modal for choosing a page type.
     *
     * @param TypeRepositoryInterface $types
     * @return \Illuminate\View\View
     */
    public function chooseType(TypeRepositoryInterface $types)
    {
        return view('module::ajax/choose_type', ['types' => $types->all()]);
    }

    /**
     * Return the modal for choosing a field type.
     *
     * @param FieldTypeCollection $fieldTypes
     * @return \Illuminate\View\View
     */
    public function chooseFieldType(FieldTypeCollection $fieldTypes)
    {
        $url = $_SERVER['HTTP_REFERER'];

        return view('module::ajax/choose_field_type', ['field_types' => $fieldTypes->all(), 'url' => $url]);
    }

    /**
     * Return the modal for choosing a field to assign.
     *
     * @param FieldRepositoryInterface $fields
     * @return \Illuminate\View\View
     */
    public function chooseField(FieldRepositoryInterface $fields, $id)
    {
        return view(
            'module::ajax/choose_field',
            ['fields' => $fields->findByNamespace('pages')->unlocked(), 'id' => $id]
        );
    }
}
