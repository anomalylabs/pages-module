<?php namespace Anomaly\PagesModule\Type\Form;

/**
 * Class TypeFormSections
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Type\Form
 */
class TypeFormSections
{

    /**
     * Handle the form sections.
     *
     * @param TypeFormBuilder $builder
     */
    public function handle(TypeFormBuilder $builder)
    {
        $builder->setSections(
            [
                'general' => [
                    'fields' => [
                        'name',
                        'slug',
                        'description',
                        'page_handler'
                    ]
                ],
                'layout'  => [
                    'fields' => [
                        'theme_layout',
                        'layout'
                    ]
                ]
            ]
        );
    }
}
