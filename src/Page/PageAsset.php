<?php namespace Anomaly\PagesModule\Page;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\Streams\Platform\Asset\Asset;

/**
 * Class PageAsset
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page
 */
class PageAsset
{

    /**
     * The asset instance.
     *
     * @var Asset
     */
    protected $asset;

    /**
     * Create a new PageAsset instance.
     *
     * @param Asset $asset
     */
    public function __construct(Asset $asset)
    {
        $this->asset = $asset;
    }

    /**
     * Add the page and page type assets.
     *
     * @param PageInterface $page
     * @throws \Exception
     */
    public function add(PageInterface $page)
    {
        $this->asset->add('styles.css', $page->getCssPath());
        $this->asset->add('scripts.js', $page->getJsPath());

        $type = $page->getType();

        $this->asset->add('styles.css', $type->getCssPath());
        $this->asset->add('scripts.js', $type->getJsPath());
    }
}
