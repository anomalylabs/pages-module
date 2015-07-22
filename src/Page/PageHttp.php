<?php namespace Anomaly\PagesModule\Page;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;

/**
 * Class PageHttp
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page
 */
class PageHttp
{

    /**
     * The setting repository.
     *
     * @var SettingRepositoryInterface
     */
    protected $settings;

    /**
     * Create a new PageHttp instance.
     *
     * @param SettingRepositoryInterface $settings
     */
    public function __construct(SettingRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Cache the page's HTTP response.
     *
     * @param PageInterface $page
     */
    public function cache(PageInterface $page)
    {
        $ttl      = $page->getTtl();
        $response = $page->getResponse();

        // if no page TTL use the page type TTL.
        if ($ttl === null && $type = $page->getType()) {
            $ttl = $type->getTtl();
        }

        // Default to settings.
        if ($ttl === null) {
            $ttl = $this->settings->get('anomaly.module.pages::ttl');
        }

        $response->setTtl($ttl * 60);
    }
}
