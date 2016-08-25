<?php namespace Anomaly\PagesModule\Http\Controller\Admin;

use Anomaly\SettingsModule\Setting\Form\SettingFormBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class SettingsController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class SettingsController extends AdminController
{

    /**
     * Return a form to edit the Pages module settings.
     *
     * @param  SettingFormBuilder                         $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(SettingFormBuilder $form)
    {
        return $form->render('anomaly.module.pages');
    }
}
