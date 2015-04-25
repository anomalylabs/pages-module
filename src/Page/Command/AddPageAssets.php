<?php namespace Anomaly\PagesModule\Page\Command;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\Streams\Platform\Asset\Asset;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class AddPageAssets
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Command
 */
class AddPageAssets implements SelfHandling
{

    /**
     * The page instance.
     *
     * @var PageInterface
     */
    protected $page;

    /**
     * Create a new AddPageAssets instance.
     *
     * @param PageInterface $page
     */
    public function __construct(PageInterface $page)
    {
        $this->page = $page;
    }

    /**
     * Handle the command.
     *
     * @param Asset $asset
     * @throws \Exception
     */
    public function handle(Asset $asset)
    {
        $asset->add('styles.css', $this->page->getCssPath(), ['live']);
        $asset->add('scripts.js', $this->page->getJsPath(), ['live']);

        $type = $this->page->getType();

        $asset->add('styles.css', $type->getCssPath(), ['live']);
        $asset->add('scripts.js', $type->getJsPath(), ['live']);
    }
}
