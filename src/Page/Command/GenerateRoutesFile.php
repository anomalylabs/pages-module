<?php namespace Anomaly\PagesModule\Page\Command;

use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\Streams\Platform\Application\Application;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Factory;
use Robbo\Presenter\Decorator;

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
     * @param Decorator               $decorator
     * @param Filesystem              $files
     * @param Factory                 $view
     */
    public function handle(
        PageRepositoryInterface $pages,
        Application $application,
        Decorator $decorator,
        Filesystem $files,
        Factory $view
    ) {
        $files->makeDirectory($application->getStoragePath('pages'), 0777, true, true);

        $files->put(
            $application->getStoragePath('pages/routes.php'),
            $view->make(
                'anomaly.module.pages::stubs/routes',
                [
                    'pages' => $decorator->decorate($pages->all())
                ]
            )->render()
        );
    }
}
