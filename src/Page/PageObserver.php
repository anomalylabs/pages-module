<?php namespace Anomaly\PagesModule\Page;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryModel;
use Anomaly\Streams\Platform\Entry\EntryObserver;
use Illuminate\Contracts\Bus\Dispatcher as CommandDispatcher;
use Illuminate\Contracts\Events\Dispatcher as EventDispatcher;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class PageObserver
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page
 */
class PageObserver extends EntryObserver
{

    /**
     * The page repository.
     *
     * @var PageRepositoryInterface
     */
    protected $pages;

    /**
     * @param EventDispatcher         $events
     * @param CommandDispatcher       $commands
     * @param PageRepositoryInterface $pages
     */
    public function __construct(EventDispatcher $events, CommandDispatcher $commands, PageRepositoryInterface $pages)
    {
        $this->pages = $pages;

        parent::__construct($events, $commands);
    }

    /**
     * Fired just before saving the page.
     *
     * @param EntryInterface|PageInterface|EntryModel $entry
     */
    public function saving(EntryInterface $entry)
    {
        /* @var Builder $query */
        if ($entry->isHome() && $query = $entry->newQuery()) {
            $query->update(['home' => false]);
        }

        if (!$entry->getStrId()) {
            $entry->str_id = str_random();
        }

        parent::saving($entry);
    }

    /**
     * Fired after a page is deleted.
     *
     * @param EntryInterface|PageInterface $entry
     */
    public function deleted(EntryInterface $entry)
    {
        foreach ($entry->getChildren() as $page) {
            $this->pages->delete($page);
        }

        parent::deleted($entry);
    }
}
