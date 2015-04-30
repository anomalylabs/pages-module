<?php namespace Anomaly\PagesModule\Page;

use Anomaly\PagesModule\Page\Command\GenerateRoutesFile;
use Anomaly\PagesModule\Page\Command\SetPagePath;
use Anomaly\PagesModule\Page\Command\UpdateChildrenPaths;
use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

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
     * Fired after a page is created.
     *
     * @param EntryInterface|PageInterface $entry
     */
    public function created(EntryInterface $entry)
    {
        $this->commands->dispatch(new GenerateRoutesFile());

        parent::created($entry);
    }

    /**
     * Fired before saving a page.
     *
     * @param EntryInterface|PageInterface $entry
     */
    public function saving(EntryInterface $entry)
    {
        $this->commands->dispatch(new SetPagePath($entry));
    }

    /**
     * Fired after a page is updated.
     *
     * @param EntryInterface|PageInterface $entry
     */
    public function updated(EntryInterface $entry)
    {
        $this->commands->dispatch(new UpdateChildrenPaths($entry));
        $this->commands->dispatch(new GenerateRoutesFile());

        parent::updated($entry);
    }

    /**
     * Fired after a page is deleted.
     *
     * @param EntryInterface|PageInterface $entry
     */
    public function deleted(EntryInterface $entry)
    {
        $this->commands->dispatch(new GenerateRoutesFile());

        parent::deleted($entry);
    }
}
