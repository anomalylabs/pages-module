<?php namespace Anomaly\PagesModule\Page\Form;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;

class PageFormFields
{

    use DispatchesJobs;

    /**
     * Handle the page fields.
     *
     * @param PageFormBuilder $builder
     * @param PreferenceRepositoryInterface $preferences
     */
    public function handle(PageFormBuilder $builder)
    {
        $parent = $builder->getParent();

        /* @var PageInterface $entry */
        if (!$parent && $entry = $builder->getFormEntry()) {
            $parent = $entry->getParent();
        }

        $builder->setFields(
            [
                '*',
                'parent'     => [
                    'config' => [
                        'mode'          => 'lookup',
                        'default_value' => $parent ? $parent->getId() : null,
                    ],
                ],
                'publish_at' => [
                    'config' => [
                        'default_value' => 'now',
                        'timezone'      => config('app.timezone'),
                    ],
                ],
                'route_name' => [
                    'value'       => !$builder->getFormEntryId()
                        ? null : "anomaly.module.pages::pages.{$builder->getFormEntryId()}",
                    'placeholder' => !$builder->getFormEntryId()
                        ? "anomaly.module.pages::pages.{\$id}"
                        : "anomaly.module.pages::pages.{$builder->getFormEntryId()}",
                    'warning'     => !$builder->getFormEntryId()
                        ? '' : "anomaly.module.pages::field.route_name.warning",
                ],
            ]
        );

        if ($parent && $translations = $parent->getTranslations()) {
            $builder->setFields(
                array_merge(
                    $builder->getFields(),
                    $translations->map(
                        function ($translation) {

                            return [
                                'field'  => 'slug',
                                'locale' => $translation->locale,
                                'config' => [
                                    'prefix' => $translation->path,
                                ],
                            ];
                        }
                    )->all()
                )
            );
        }
    }
}
