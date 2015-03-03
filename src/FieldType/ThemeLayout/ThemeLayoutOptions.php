<?php namespace Anomaly\PagesModule\FieldType\ThemeLayout;

use Anomaly\Streams\Platform\Addon\Theme\ThemeCollection;
use Illuminate\Filesystem\Filesystem;

/**
 * Class ThemeLayoutOptions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\FieldType\ThemeLayout
 */
class ThemeLayoutOptions
{

    /**
     * Handle the options.
     *
     * @param ThemeCollection $themes
     * @param Filesystem      $files
     * @return array
     */
    public function handle(ThemeCollection $themes, Filesystem $files)
    {
        $theme = $themes->active();

        return array_map(
            function ($file) {
                return basename($file);
            },
            $files->files($theme->getPath('resources/views/layouts'))
        );
    }
}
