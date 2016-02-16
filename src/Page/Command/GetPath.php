<?php namespace Anomaly\PagesModule\Page\Command;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetPath
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Command
 */
class GetPath implements SelfHandling
{

    /**
     * The page instance.
     *
     * @var PageInterface
     */
    protected $page;

    /**
     * Create a new GetPath instance.
     *
     * @param PageInterface $page
     */
    public function __construct(PageInterface $page)
    {
        $this->page = $page;
    }

    /**
     * Handle the command.
     */
    public function handle()
    {
        if (!$this->page->isEnabled()) {
            return 'pages/preview/' . $this->page->getStrId();
        } else {
            if ($parent = $this->page->getParent()) {
                if ($parent->isHome()) {
                    return $parent->getSlug() . '/' . $this->page->getSlug();
                } else {
                    return $parent->getPath() . '/' . $this->page->getSlug();
                }
            } elseif ($this->page->isHome()) {
                return '/';
            } else {
                return $this->page->getSlug();
            }
        }
    }
}
