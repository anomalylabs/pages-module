<?php namespace Anomaly\PagesModule;

use Anomaly\PagesModule\Seeder\PageSeeder;
use Anomaly\PagesModule\Seeder\TypeSeeder;
use Anomaly\Streams\Platform\Database\Seeder\Seeder;

/**
 * Class PagesModuleSeeder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PagesModule
 */
class PagesModuleSeeder extends Seeder
{

    /**
     * Run the seeder.
     */
    public function run()
    {
        $this->call(TypeSeeder::class);
        $this->call(PageSeeder::class);
    }
}
