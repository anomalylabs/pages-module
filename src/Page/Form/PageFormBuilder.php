<?php namespace Anomaly\PagesModule\Page\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class PageFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Form
 */
class PageFormBuilder extends FormBuilder
{

    /**
     * The form model.
     *
     * @var string
     */
    protected $model = 'Anomaly\PagesModule\Page\PageModel';

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        'title',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'path',
        'parent',
        'css',
        'js'
    ];

}
