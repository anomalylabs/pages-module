<?php namespace Anomaly\PagesModule\Listener;

use Anomaly\Streams\Platform\Application\Event\SystemIsRefreshing;

/**
 * Class RefreshPagesModule
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class RefreshPagesModule
{

    /**
     * Handle the command.
     *
     * @param SystemIsRefreshing $event
     */
    public function handle(SystemIsRefreshing $event)
    {
        $command = $event->getCommand();

        $command->call('pages:dump');
    }
}
