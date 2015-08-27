<?php namespace Anomaly\PagesModule\Page\Console;

use Anomaly\PagesModule\Page\Command\GenerateRoutesFile;
use Illuminate\Console\Command;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class Generate
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Console
 */
class Generate extends Command
{

    use DispatchesJobs;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'pages:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the page routes file.';

    /**
     * Execute the console command.
     *
     * @param Dispatcher $events
     */
    public function fire()
    {
        $this->dispatch(new GenerateRoutesFile());

        $this->info('Pages routes have been generated.');
    }
}
