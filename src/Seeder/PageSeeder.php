<?php namespace Anomaly\PagesModule\Seeder;

use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\PagesModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Database\Seeder\Seeder;
use Anomaly\Streams\Platform\Model\Pages\PagesDefaultPagesEntryModel;

/**
 * Class PageSeeder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PagesModule\Seeder
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
     * Create a new PageSeeder instance.
     *
     * @param PageRepositoryInterface $pages
     * @param TypeRepositoryInterface $types
     */
    public function __construct(PageRepositoryInterface $pages, TypeRepositoryInterface $types)
    {
        $this->pages = $pages;
        $this->types = $types;
    }

    /**
     * Run the seeder.
     */
    public function run()
    {
        $this->pages->truncate();

        $type = $this->types->findBySlug('default');

        $welcome = (new PagesDefaultPagesEntryModel())->create(
            [
                'content' => '<p>Welcome to PyroCMS!</p>'
            ]
        );

        $this->pages->create(
            [
                'en'           => [
                    'title' => 'Welcome'
                ],
                'slug'         => 'welcome',
                'entry'        => $welcome,
                'type'         => $type,
                'enabled'      => true,
                'home'         => true,
                'theme_layout' => 'theme::layouts/default.twig'
            ]
        );
    }
}
