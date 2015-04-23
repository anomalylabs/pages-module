<?php namespace Anomaly\PagesModule\Page\Command;

use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Routing\ResponseFactory;

/**
 * Class GetPageResponse
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Command
 */
class GetPageResponse implements SelfHandling
{

    /**
     * The page ID.
     *
     * @var int
     */
    protected $id;

    /**
     * Create a new GetPageResponse instance.
     *
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Handle the page response.
     *
     * @param PageRepositoryInterface    $pages
     * @param SettingRepositoryInterface $settings
     * @param ResponseFactory            $response
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(
        PageRepositoryInterface $pages,
        SettingRepositoryInterface $settings,
        ResponseFactory $response
    ) {
        $page = $pages->find($this->id);

        return $response
            ->view('anomaly.module.pages::page', compact('page'))
            ->setTtl($page->getTtl() ?: $settings->get('anomaly.module.pages::ttl'));
    }
}
