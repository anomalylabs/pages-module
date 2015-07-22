<?php namespace Anomaly\PagesModule\Type;

use Anomaly\PagesModule\Type\Command\CreateTypeStream;
use Anomaly\PagesModule\Type\Command\DeleteTypePages;
use Anomaly\PagesModule\Type\Command\DeleteTypeStream;
use Anomaly\PagesModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class TypeObserver
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Type
 */
class TypeObserver extends EntryObserver
{

    /**
     * Fired after a page type is created.
     *
     * @param EntryInterface|TypeInterface $entry
     */
    public function created(EntryInterface $entry)
    {
        $this->commands->dispatch(new CreateTypeStream($entry));

        parent::created($entry);
    }

    /**
     * Fired after a page type is deleted.
     *
     * @param EntryInterface|TypeInterface $entry
     */
    public function deleted(EntryInterface $entry)
    {
        $this->commands->dispatch(new DeleteTypePages($entry));
        $this->commands->dispatch(new DeleteTypeStream($entry));

        parent::deleted($entry);
    }
}
