<?php namespace Anomaly\PagesModule\Page\Command;

use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\PagesModule\PagesModule;
use Anomaly\Streams\Platform\Application\Application;
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

    /**
     * Handle the command.
     *
     * @param PageRepositoryInterface $pages
     * @param Application             $application
     * @param PagesModule             $module
     * @param Filesystem              $files
     */
    public function handle(
        PageRepositoryInterface $pages,
        Application $application,
        PagesModule $module,
        Filesystem $files
    ) {
        $files->makeDirectory($application->getStoragePath('pages'), 0777, true, true);

        $files->put(
            $application->getStoragePath('pages/routes.php'),
            app('Anomaly\Streams\Platform\Support\String')->render(
                $files->get($module->getPath('resources/assets/routes.stub')),
                [
                    'pages' => $pages->all()
                ]
            )
        );
    }
}
