<?php namespace Anomaly\PagesModule\Page\Form;

use Anomaly\PagesModule\Page\Command\GetRealPath;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class PageFormFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Form
 */
class PageFormFields implements SelfHandling
{

    use DispatchesJobs;

    public function handle(PageFormBuilder $builder)
    {
        $type   = $builder->getType();
        $parent = $builder->getParent();

        $builder->setFields(
            [
                '*',
                'slug'         => [
                    'config' => [
                        'prefix' => ($parent ? url($this->dispatch(new GetRealPath($parent))) : url()) . '/'
                    ]
                ],
                'theme_layout' => [
                    'config' => [
                        'default_value' => $type->getThemeLayout()
                    ]
                ]
            ]
        );
    }
}
