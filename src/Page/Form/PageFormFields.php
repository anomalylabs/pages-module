<?php namespace Anomaly\PagesModule\Page\Form;

use Anomaly\PagesModule\Page\Command\GetRealPath;
use Anomaly\PagesModule\Page\Contract\PageInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class PageFormFields
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class PageFormFields
{

    use DispatchesJobs;

    /**
     * Handle the page fields.
     *
     * @param PageFormBuilder $builder
     */
    public function handle(PageFormBuilder $builder)
    {
        $type   = $builder->getType();
        $parent = $builder->getParent();

        /* @var PageInterface $entry */
        if (!$parent && $entry = $builder->getFormEntry()) {
            $parent = $entry->getParent();
        }

        $builder->setFields(
            [
                '*',
                'slug'         => [
                    'config' => [
                        'prefix' => ($parent ? url($this->dispatch(new GetRealPath($parent))) : url()) . '/',
                    ],
                ],
                'theme_layout' => [
                    'config' => [
                        'default_value' => $type ? $type->getThemeLayout() : null,
                    ],
                ],
            ]
        );
    }
}
