<?php namespace Anomaly\PagesModule\Type\Command;

use Anomaly\PagesModule\Type\Contract\PageTypeInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class DeletePageTypeStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Type\Command
 */
class DeletePageTypeStream implements SelfHandling
{

    /**
     * The page type instance.
     *
     * @var PageTypeInterface
     */
    protected $pageType;

    /**
     * Create a new DeletePageTypeStream instance.
     *
     * @param PageTypeInterface $pageType
     */
    public function __construct(PageTypeInterface $pageType)
    {
        $this->pageType = $pageType;
    }

    /**
     * Handle the command.
     *
     * @param StreamRepositoryInterface $streams
     */
    public function handle(StreamRepositoryInterface $streams)
    {
        $streams->delete($streams->findBySlugAndNamespace($this->pageType->getSlug(), 'pages'));
    }
}
