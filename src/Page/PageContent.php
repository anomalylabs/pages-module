<?php namespace Anomaly\PagesModule\Page;

use Anomaly\EditorFieldType\EditorFieldType;
use Anomaly\PagesModule\Page\Contract\PageInterface;
use Illuminate\View\Factory;
use Robbo\Presenter\Decorator;

/**
 * Class PageContent
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PagesModule\Page
 */
class PageContent
{

    /**
     * The view factory.
     *
     * @var Factory
     */
    protected $view;

    /**
     * The decorator utility.
     *
     * @var Decorator
     */
    protected $decorator;

    /**
     * Create a new PageContent instance.
     *
     * @param Factory   $view
     * @param Decorator $decorator
     */
    public function __construct(Factory $view, Decorator $decorator)
    {
        $this->view      = $view;
        $this->decorator = $decorator;
    }

    /**
     * Make the view content.
     *
     * @param PageInterface $page
     */
    public function make(PageInterface $page)
    {
        $type = $page->getType();

        /* @var EditorFieldType $layout */
        $layout = $type->getFieldType('layout');

        $page->setContent($this->view->make($layout->getViewPath(), compact('page'))->render());
    }
}
