<?php namespace Anomaly\PagesModule\Page\Form;

use Anomaly\PagesModule\Page\Command\GetRealPath;
use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;

class PageFormFields
{

    use DispatchesJobs;

    /**
     * Handle the page fields.
     *
     * @param PageFormBuilder               $builder
     * @param PreferenceRepositoryInterface $preferences
     */
    public function handle(PageFormBuilder $builder, PreferenceRepositoryInterface $preferences)
    {
        $parent = $builder->getParent();

        /* @var PageInterface $entry */
        if (!$parent && $entry = $builder->getFormEntry()) {
            $parent = $entry->getParent();
        }

        $builder->setFields(
            [
                '*',
                'parent' => [
                    'config' => [
                        'mode'          => 'lookup',
                        'default_value' => $parent ? $parent->getId() : null,
                    ],
                ],
                'slug'   => [
                    'config' => [
                        'prefix' => ($parent ? url($this->dispatch(new GetRealPath($parent))) : url('/')) . '/',
                    ],
                ],
            ]
        );
    }
}
