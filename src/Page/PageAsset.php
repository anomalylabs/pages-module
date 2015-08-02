<?php namespace Anomaly\PagesModule\Page;

use Anomaly\EditorFieldType\EditorFieldTypePresenter;
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
        /* @var EditorFieldTypePresenter $js */
        /* @var EditorFieldTypePresenter $css */
        $js  = $page->getFieldTypePresenter('js');
        $css = $page->getFieldTypePresenter('css');

        $this->asset->add('styles.css', $css->path());
        $this->asset->add('scripts.js', $js->path());

        $type = $page->getType();

        $js  = $type->getFieldTypePresenter('js');
        $css = $type->getFieldTypePresenter('css');

        $this->asset->add('styles.css', $css->path());
        $this->asset->add('scripts.js', $js->path());
    }
}
