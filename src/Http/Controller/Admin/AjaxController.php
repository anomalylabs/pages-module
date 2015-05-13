<?php namespace Anomaly\PagesModule\Http\Controller\Admin;

use Anomaly\PagesModule\Type\Contract\PageTypeRepositoryInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeCollection;
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
     * @param PageTypeRepositoryInterface $types
     * @return \Illuminate\View\View
     */
    public function choosePageType(PageTypeRepositoryInterface $types)
    {
        return view('module::ajax/choose_page_type', ['types' => $types->all()]);
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
}
