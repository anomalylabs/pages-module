<?php namespace Anomaly\PagesModule\Type;

use Anomaly\PagesModule\Type\Command\CreatePageTypeStream;
use Anomaly\PagesModule\Type\Command\DeletePageTypeStream;
use Anomaly\PagesModule\Type\Contract\PageTypeInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class PageTypeObserver
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Type
 */
class PageTypeObserver extends EntryObserver
{

    /**
     * Fired after a page type is created.
     *
     * @param EntryInterface|PageTypeInterface $entry
     */
    public function created(EntryInterface $entry)
    {
        $this->commands->dispatch(new CreatePageTypeStream($entry));

        parent::created($entry);
    }

    /**
     * Fired after a page type is deleted.
     *
     * @param EntryInterface|PageTypeInterface $entry
     */
    public function deleted(EntryInterface $entry)
    {
        $this->commands->dispatch(new DeletePageTypeStream($entry));

        parent::deleted($entry);
    }
}
