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
     * Skip these fields.
     *
     * @var array
     */
    protected $skips = [
        'path',
        'type',
        'entry',
        'parent',
        'allowed_roles'
    ];

}
