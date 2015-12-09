<?php namespace Anomaly\PagesModule\Page\Command;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\Streams\Platform\Model\EloquentModel;
use Anomaly\Streams\Platform\View\ViewTemplate;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetPage
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Command
 */
class GetPage implements SelfHandling
{

    /**
     * The identifier.
     *
     * @var mixed
     */
    protected $identifier;

    /**
     * Create a new GetPage instance.
     *
     * @param $identifier
     */
    public function __construct($identifier = null)
    {
        $this->identifier = $identifier;
    }

    /**
     * Handle the command.
     *
     * @param PageRepositoryInterface $pages
     * @param ViewTemplate            $template
     * @return PageInterface|EloquentModel|null
     */
    public function handle(PageRepositoryInterface $pages, ViewTemplate $template)
    {
        if (is_null($this->identifier)) {
            return $template->get('page');
        }

        if (is_numeric($this->identifier)) {
            return $pages->find($this->identifier);
        }

        if (!is_numeric($this->identifier)) {
            return $pages->findByPath($this->identifier);
        }

        return null;
    }
}
