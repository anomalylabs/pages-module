<?php namespace Anomaly\PagesModule\Page;

use Anomaly\EditorFieldType\EditorFieldType;
use Anomaly\EditorFieldType\EditorFieldTypePresenter;
use Anomaly\PagesModule\Page\Contract\PageInterface;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\View\Factory;
use Robbo\Presenter\Decorator;

/**
 * Class PageContent
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
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
     * The response factory.
     *
     * @var ResponseFactory
     */
    protected $response;

    /**
     * Create a new PageContent instance.
     *
     * @param Factory         $view
     * @param Decorator       $decorator
     * @param ResponseFactory $response
     */
    public function __construct(Factory $view, Decorator $decorator, ResponseFactory $response)
    {
        $this->view      = $view;
        $this->decorator = $decorator;
        $this->response  = $response;
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
        /* @var EditorFieldTypePresenter $presenter */
        $layout    = $type->getFieldType('layout');
        $presenter = $type->getFieldTypePresenter('layout');

        $page->setContent($this->view->make($layout->getViewPath(), compact('page'))->render());

        /**
         * If the type layout is taking the
         * reigns then allow it to do so.
         *
         * This will let layouts natively
         * extend parent view blocks.
         */
        if (strpos($presenter->content(), '{% extends') !== false) {
            $page->setResponse($this->response->make($page->getContent()));
        }
    }
}
