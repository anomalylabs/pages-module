<?php namespace Anomaly\PagesModule\Page;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Class PageCollection
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page
 */
class PageCollection extends EntryCollection
{

    /**
     * Return only live pages.
     *
     * @return PageCollection
     */
    public function live()
    {
        return self::make(
            array_filter(
                $this->items,
                function (PageInterface $page) {
                    return $page->isLive();
                }
            )
        );
    }

    /**
     * Return only top level pages.
     *
     * @return PageCollection
     */
    public function top()
    {
        return self::make(
            array_filter(
                $this->items,
                function (PageInterface $page) {
                    return $page->isTop();
                }
            )
        );
    }

    /**
     * Return only children of
     * the provided parent.
     *
     * @param PageInterface $parent
     * @return PageCollection
     */
    public function children(PageInterface $parent)
    {
        return self::make(
            array_filter(
                $this->items,
                function (PageInterface $page) use ($parent) {
                    return $page->getParentId() == $parent->getId();
                }
            )
        );
    }
}
