<?php namespace Anomaly\PagesModule\Page;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Class PageCollection
 *
 * @page          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page
 */
class PageCollection extends EntryCollection
{

    /**
     * Return only enabled pages.
     *
     * @return PageCollection
     */
    public function enabled()
    {
        return self::make(
            array_filter(
                $this->items,
                function ($page) {

                    /* @var PageInterface $page */
                    return $page->isEnabled();
                }
            )
        );
    }

    /**
     * Alias for $this->top()
     *
     * @return PageCollection
     */
    public function root()
    {
        return $this->top();
    }

    /**
     * Return only top level pages.
     *
     * @return PageCollection
     */
    public function top()
    {
        return $this->filter(
            function ($item) {

                /* @var PageInterface $item */
                return !$item->getParentId();
            }
        );
    }

    /**
     * Return only children of the provided item.
     *
     * @param $parent
     * @return PageCollection
     */
    public function children($parent)
    {
        /* @var PageInterface $parent */
        return $this->filter(
            function ($item) use ($parent) {

                /* @var PageInterface $item */
                return $item->getParentId() == $parent->getId();
            }
        );
    }

    /**
     * Return whether the provided
     * page has an active child.
     *
     * @param $parent
     * @return bool
     */
    public function hasActive($parent, $active)
    {
        /* @var PageInterface $parent */
        /* @var PageInterface $active */
        if ($active->getId() == $parent->getId()) {
            return false;
        }

        if ($active->getParentId() == $parent->getId()) {
            return true;
        }

        $children = $this->children($parent);

        if (!$children->isEmpty()) {
            foreach ($children as $child) {
                if ($children->hasActive($child, $active)) {
                    return true;
                }
            }
        }

        return false;
    }
}
