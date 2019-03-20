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
    public function handle(PageFormBuilder $builder, PreferenceRepositoryInterface $preferences)
    {
        $parent = $builder->getParent();

        /* @var PageInterface $entry */
        if (!$parent && $entry = $builder->getFormEntry()) {
            $parent = $entry->getParent();
        }

        $translations = $parent->getTranslations();

        $slugs = $translations->map(
            function ($translation) {

                return [
                    'field'        => 'slug',
                    'locale'       => $translation->locale,
                    'config'       => [
                        'prefix' => $translation->path,
                    ],
                ];
            }
        )->all();

        $builder->setFields(
            array_merge([
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
            ], $slugs)
        );
    }
}
