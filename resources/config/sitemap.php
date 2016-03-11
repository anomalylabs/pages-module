<?php

return [
    'lastmod' => function (\Anomaly\PagesModule\Page\Contract\PageRepositoryInterface $pages) {

        $page = $pages->lastModified();

        return $page->lastModified()->toAtomString();
    },
    'entries' => function (\Anomaly\PagesModule\Page\Contract\PageRepositoryInterface $pages) {
        return $pages->accessible()->visible();
    },
    'handler' => function (\Roumen\Sitemap\Sitemap $sitemap, \Anomaly\PagesModule\Page\Contract\PageInterface $entry) {
        $sitemap->add(url($entry->getPath()), $entry->lastModified()->toAtomString(), 0.5, 'monthly');
    }
];
