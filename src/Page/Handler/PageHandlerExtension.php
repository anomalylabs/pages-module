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
     * Route the page's response.
     *
     * @param PageInterface $page
     */
    public function route(PageInterface $page)
    {

        if (!$page->isExact()) {

            \Route::any(
                $page->getPath() . '/{any?}',
                [
                    'uses'                       => 'Anomaly\PagesModule\Http\Controller\PagesController@view',
                    'streams::addon'             => 'anomaly.module.pages',
                    'anomaly.module.pages::page' => $page->getId(),
                    'where'                      => [
                        'any' => '(.*)',
                    ],
                ]
            );

            return;
        }

        \Route::any(
            $page->getPath(),
            [
                'uses'                       => 'Anomaly\PagesModule\Http\Controller\PagesController@view',
                'streams::addon'             => 'anomaly.module.pages',
                'anomaly.module.pages::page' => $page->getId(),
            ]
        );
    }
}
