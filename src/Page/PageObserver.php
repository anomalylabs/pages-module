<?php namespace Anomaly\PagesModule\Page;

use Anomaly\PagesModule\Page\Command\DeleteChildren;
use Anomaly\PagesModule\Page\Command\ResetHome;
use Anomaly\PagesModule\Page\Command\SetPath;
use Anomaly\PagesModule\Page\Command\SetStrId;
use Anomaly\PagesModule\Page\Command\UpdatePaths;
use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryModel;
use Anomaly\Streams\Platform\Entry\EntryObserver;
use Illuminate\Contracts\Bus\Dispatcher as CommandDispatcher;
use Illuminate\Contracts\Events\Dispatcher as EventDispatcher;

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
     * Fired before saving the page.
     *
     * @param EntryInterface|PageInterface|EntryModel $entry
     */
    public function saving(EntryInterface $entry)
    {
        $this->dispatch(new ResetHome($entry));
        $this->dispatch(new SetStrid($entry));
        $this->dispatch(new SetPath($entry));

        parent::saving($entry);
    }

    /**
     * Fired after saving the page.
     *
     * @param EntryInterface|PageInterface|EntryModel $entry
     */
    public function saved(EntryInterface $entry)
    {
        $this->dispatch(new UpdatePaths($entry));

        parent::saved($entry);
    }

    /**
     * Fired after a page is deleted.
     *
     * @param EntryInterface|PageInterface $entry
     */
    public function deleted(EntryInterface $entry)
    {
        $this->dispatch(new DeleteChildren($entry));

        parent::deleted($entry);
    }
}
