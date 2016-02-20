<?php namespace Anomaly\PagesModule\Seeder;

use Anomaly\PagesModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Database\Seeder\Seeder;

/**
 * Class TypeSeeder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PagesModule\Seeder
 */
class TypeSeeder extends Seeder
{

    /**
     * The type repository.
     *
     * @var TypeRepositoryInterface
     */
    protected $types;

    /**
     * Create a new TypeSeeder instance.
     *
     * @param $types
     */
    public function __construct(TypeRepositoryInterface $types)
    {
        $this->types = $types;
    }

    /**
     * Run the seeder.
     */
    public function run()
    {
        $this->types
            ->truncate()
            ->create(
                [
                    'en'           => [
                        'name'        => 'Default',
                        'description' => 'A simple page type.'
                    ],
                    'slug'         => 'default',
                    'handler'      => 'anomaly.extension.default_page_handler',
                    'theme_layout' => 'theme::layouts/default.twig',
                    'layout'       => '<h1>{{ page.title }}</h1>

{{ page.content|raw }}'
                ]
            );
    }
}
