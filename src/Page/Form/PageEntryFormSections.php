<?php namespace Anomaly\PagesModule\Page\Form;

use Anomaly\PagesModule\Page\PageModel;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

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
                'entry' => [
                    'title'  => 'streams::tab.entry',
                    'fields' => function (PageEntryFormBuilder $builder) {
                        return array_map(
                            function (FieldType $field) {
                                return $field->getField();
                            },
                            array_filter(
                                $builder->getFormFields()->all(),
                                function (FieldType $field) {
                                    return (!$field->getEntry() instanceof PageModel);
                                }
                            )
                        );
                    }
                ],
                'field' => [
                    'title'  => 'module::tab.page',
                    'fields' => function (PageEntryFormBuilder $builder) {
                        return array_map(
                            function (FieldType $field) {
                                return $field->getField();
                            },
                            array_filter(
                                $builder->getFormFields()->all(),
                                function (FieldType $field) {
                                    return ($field->getEntry() instanceof PageModel);
                                }
                            )
                        );
                    }
                ]
            ]
        );
    }
}
