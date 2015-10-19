<?php namespace Anomaly\PagesModule\Page;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\Streams\Platform\View\ViewTemplate;

/**
 * Class PageLoader
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page
 */
class PageLoader
{

    /**
     * The template data.
     *
     * @var ViewTemplate
     */
    protected $template;

    /**
     * Create a new PageLoader instance.
     *
     * @param ViewTemplate $template
     */
    public function __construct(ViewTemplate $template)
    {
        $this->template = $template;
    }

    /**
     * Load page data to the template.
     *
     * @param PageInterface $page
     */
    public function load(PageInterface $page)
    {
        $this->template->set('title', $page->getTitle());
        $this->template->set('meta_title', $page->getMetaTitle());
        $this->template->set('meta_keywords', $page->getMetaKeywords());
        $this->template->set('meta_description', $page->getMetaDescription());
    }
}
