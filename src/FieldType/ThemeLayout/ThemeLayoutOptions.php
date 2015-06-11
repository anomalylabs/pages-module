<?php namespace Anomaly\PagesModule\FieldType\ThemeLayout;

use Anomaly\Streams\Platform\Addon\Theme\Theme;
use Anomaly\Streams\Platform\Addon\Theme\ThemeCollection;
use Illuminate\Config\Repository;
use Illuminate\Container\Container;
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
    public function handle(Container $container, Repository $config, Filesystem $files)
    {
        /* @var Theme $theme */
        $theme = $container->make($config->get('streams::themes.active.standard'));

        $options = $files->files($theme->getPath('resources/views/layouts'));

        return array_combine(
            $options,
            array_map(
                function ($path) use ($theme) {
                    return ltrim(str_replace($theme->getPath('resources/views/layouts'), null, $path), '/');
                },
                $options
            )
        );
    }
}
