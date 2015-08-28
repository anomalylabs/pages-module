<?php namespace Anomaly\PagesModule\Page\Listener;

use Anomaly\Streams\Platform\Stream\Console\Event\StreamsIsRefreshing;

/**
 * Class RefreshPagesModule
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Listener
 */
class RefreshPagesModule
{

    /**
     * Handle the event.
     *
     * @param StreamsIsRefreshing $event
     */
    public function handle(StreamsIsRefreshing $event)
    {
        $command = $event->getCommand();

        $command->call('pages:generate');
    }
}
