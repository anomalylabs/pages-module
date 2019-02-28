<?php namespace Anomaly\PagesModule\Page\Handler;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\Handler\Contract\PageHandlerInterface;
use Anomaly\Streams\Platform\Addon\Extension\Extension;

/**
 * Class PageHandlerExtension
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class PageHandlerExtension extends Extension implements PageHandlerInterface
{

    /**
     * Make the page's response.
     *
     * @param PageInterface $page
     */
    public function make(PageInterface $page)
    {
        throw new \Exception('Implement make() method.');
    }

    /**
     * Return the page's route dump.
     *
     * @param PageInterface $page
     * @return null|string
     */
    public function route(PageInterface $page)
    {

        /**
         * If the page is exact then
         * return it as is with no {any}.
         */
        if ($page->isExact()) {
            return "Route::any('{$page->getPath()}', [
    'uses'                       => 'Anomaly\\PagesModule\\Http\\Controller\\PagesController@view',
    'as'                         => 'anomaly.module.pages::pages.{$page->getId()}',
    'streams::addon'             => 'anomaly.module.pages',
    'anomaly.module.pages::page' => {$page->getId()},
]);";
        }

        /**
         * If the page is not exact
         * it must accommodate {any}.
         */
        if (!$page->isExact()) {
            return "Route::any('{$page->getPath()}/{any?}', [
    'uses'                       => 'Anomaly\\PagesModule\\Http\\Controller\\PagesController@view',
    'as'                         => 'anomaly.module.pages::pages.{$page->getId()}',
    'streams::addon'             => 'anomaly.module.pages',
    'anomaly.module.pages::page' => {$page->getId()},
    'where'                      => [
        'any' => '(.*)',
    ],
]);";
        }

        return null;
    }
}
