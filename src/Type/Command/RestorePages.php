<?php namespace Anomaly\PagesModule\Type\Command;

use Anomaly\DocumentationModule\Page\Contract\PageRepositoryInterface;
use Anomaly\DocumentationModule\Type\Contract\TypeInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class RestorePages
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PagesModule\Type\Command
 */
class RestorePages implements SelfHandling
{

    /**
     * The page type instance.
     *
     * @var TypeInterface
     */
    protected $type;

    /**
     * Create a new RestorePages instance.
     *
     * @param TypeInterface $type
     */
    public function __construct(TypeInterface $type)
    {
        $this->type = $type;
    }

    /**
     * Handle the command.
     *
     * @param PageRepositoryInterface $pages
     */
    public function handle(PageRepositoryInterface $pages)
    {
        foreach ($this->type->pages()->onlyTrashed()->get() as $page) {
            $pages->restore($page);
        }
    }
}
