<?php namespace Anomaly\PagesModule\Page\Form;

/**
 * Class PageFormOptions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Form
 */
class PageFormOptions
{

    /**
     * Handle the form options.
     *
     * @param PageFormBuilder $builder
     */
    public function handle(PageFormBuilder $builder)
    {
        $builder->setFormOption(
            'sections',
            [
                [
                    'tabs' => [
                        'general' => [
                            'title'  => 'streams::tab.general',
                            'fields' => [
                                'title'
                            ]
                        ]
                    ]
                ]
            ]
        );
    }
}
