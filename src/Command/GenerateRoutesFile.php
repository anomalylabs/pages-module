<?php namespace Anomaly\PagesModule\Command;

use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\PagesModule\PagesModule;
use Anomaly\Streams\Platform\Application\Application;
use Anomaly\Streams\Platform\Support\String;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Filesystem\Filesystem;

/**
 * Class GenerateRoutesFile
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Command
 */
class GenerateRoutesFile implements SelfHandling
{

    public function handle(
        Application $application,
        Filesystem $files,
        PageRepositoryInterface $pages,
        PagesModule $module
    ) {
        $pages = $pages->all();

        $files->put($application->getStoragePath('pages/routes.php'), app('Anomaly\Streams\Platform\Support\String')->render($files->get($module->getPath('resources/assets/routes.template')), compact('pages')));
    }
}
