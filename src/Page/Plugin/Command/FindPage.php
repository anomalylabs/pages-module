<?php namespace Anomaly\PagesModule\Page\Plugin\Command;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\Streams\Platform\View\ViewTemplate;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class FindPage
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Plugin\Command
 */
class FindPage implements SelfHandling
{

    /**
     * The identifier.
     *
     * @var array
     */
    protected $identifier;

    /**
     * Create a new FindPage command.
     *
     * @param $identifier
     */
    public function __construct($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * Handle the command.
     *
     * @param PageRepositoryInterface $pages
     * @param ViewTemplate            $template
     * @return PageInterface|null
     */
    public function handle(PageRepositoryInterface $pages, ViewTemplate $template)
    {
        if (is_numeric($this->identifier)) {
            return $pages->find($this->identifier);
        }

        if (is_null($this->identifier)) {
            return $template->get('page');
        }

        return $pages->findByPath($this->identifier);
    }
}
