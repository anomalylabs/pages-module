<?php namespace Anomaly\PagesModule\Page\Form;

/**
 * Class PageEntryFormSections
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Form
 */
class PageEntryFormSections
{

    /**
     * Handle the form sections.
     *
     * @param PageEntryFormBuilder $builder
     */
    public function handle(PageEntryFormBuilder $builder)
    {
        $builder->setSections(
            [
                'general' => [
                    'tabs' => [
                        'general' => [
                            'title'  => 'General',
                            'fields' => [
                                'title',
                                'slug'
                            ]
                        ],
                        'entry'   => [
                            'title'  => 'Custom Fields',
                            'fields' => [
                                'markdown'
                            ]
                        ]
                    ]
                ]
            ]
        );
    }
}
