<?php

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Illuminate\Contracts\Config\Repository;
use Roumen\Sitemap\Sitemap;

return [
    'lastmod' => function (PageRepositoryInterface $pages) {

        $page = $pages->lastModified();

        return $page->lastModified()->toAtomString();
    },
    'entries' => function (PageRepositoryInterface $pages) {
        return $pages->accessible()->visible();
    },
    'handler' => function (Sitemap $sitemap, Repository $config, PageInterface $entry) {

        $translations = [];

        foreach ($config->get('streams::locales.enabled') as $locale) {
            if ($locale != $config->get('streams::locales.default')) {
                $translations[] = [
                    'language' => $locale,
                    'url'      => url($locale . $entry->getPath()),
                ];
            }
        }

        $sitemap->add(
            url($entry->getPath()),
            $entry->lastModified()->toAtomString(),
            0.5,
            'monthly',
            [],
            null,
            $translations
        );
    },
];
