<?php namespace Anomaly\PagesModule\Page;

use Anomaly\BlocksModule\Block\Contract\BlockRepositoryInterface;
use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\PagesModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Database\Seeder\Seeder;
use Anomaly\Streams\Platform\Model\WysiwygBlock\WysiwygBlockBlocksEntryModel;

/**
 * Class PageSeeder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class PageSeeder extends Seeder
{

    /**
     * The page repository.
     *
     * @var PageRepositoryInterface
     */
    protected $pages;

    /**
     * The types repository.
     *
     * @var TypeRepositoryInterface
     */
    protected $types;

    /**
     * The blocks repository.
     *
     * @var BlockRepositoryInterface
     */
    protected $blocks;

    /**
     * Create a new PageSeeder instance.
     *
     * @param PageRepositoryInterface $pages
     * @param TypeRepositoryInterface $types
     */
    public function __construct(
        PageRepositoryInterface $pages,
        TypeRepositoryInterface $types,
        BlockRepositoryInterface $blocks
    ) {
        $this->pages  = $pages;
        $this->types  = $types;
        $this->blocks = $blocks;

        parent::__construct();
    }

    /**
     * Run the seeder.
     */
    public function run()
    {
        $this->pages->truncate();

        $type = $this->types->findBySlug('default');

        $field = $this->fields->findBySlugAndNamespace('content', 'pages');

        /* @var PageInterface $page */
        $page = $this->pages->create(
            [
                'en'           => [
                    'title' => 'Welcome',
                ],
                'slug'         => 'welcome',
                'entry'        => $type->getEntryModel()->create(),
                'type'         => $type,
                'enabled'      => true,
                'home'         => true,
                'theme_layout' => 'theme::layouts/default.twig',
            ]
        );

        $this->blocks->create(
            [
                'field'     => $field,
                'area'      => $page->getEntry(),
                'extension' => 'anomaly.extension.wysiwyg_block',
                'entry'     => WysiwygBlockBlocksEntryModel::create(
                    [
                        'en' => [
                            'content' => '<p>Welcome to PyroCMS!</p>',
                        ],
                    ]
                ),
            ]
        );
    }
}
