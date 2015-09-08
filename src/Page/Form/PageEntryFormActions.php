<?php namespace Anomaly\PagesModule\Page\Form;

/**
 * Class PageEntryFormActions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Form
 */
class PageEntryFormActions
{

    /**
     * Handle the form actions.
     *
     * @param PageEntryFormBuilder $builder
     */
    public function handle(PageEntryFormBuilder $builder)
    {
        $builder->setActions(
            [
                'save'          => [
                    'redirect' => function () {
                        return url('admin/pages');
                    }
                ],
                'save_and_edit' => [
                    'redirect' => function (PageEntryFormBuilder $builder) {
                        return url('admin/pages/edit/' . $builder->getEntry());
                    }
                ]
            ]
        );
    }
}
