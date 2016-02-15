<?php namespace Anomaly\PagesModule\Page;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\Streams\Platform\Entry\EntryPresenter;
use Anomaly\Streams\Platform\Support\Decorator;

/**
 * Class PagePresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page
 */
class PagePresenter extends EntryPresenter
{

    /**
     * The decorated object.
     * This is for IDE hinting.
     *
     * @var PageInterface
     */
    protected $object;

    /**
     * Create a new PagePresenter instance.
     *
     * @param mixed $object
     */
    public function __construct($object)
    {
        $this->object = $object;
    }

    /**
     * Catch calls to fields on
     * the page's related entry.
     *
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        $entry = $this->object->getEntry();

        if ($entry->hasField($key)) {
            return (New Decorator())->decorate($entry)->{$key};
        }

        return parent::__get($key);
    }
}
