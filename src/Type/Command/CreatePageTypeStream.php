<?php namespace Anomaly\PagesModule\Type\Command;

use Anomaly\PagesModule\Type\Contract\PageTypeInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class CreatePageTypeStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Type\Command
 */
class CreatePageTypeStream implements SelfHandling
{

    /**
     * The page type instance.
     *
     * @var PageTypeInterface
     */
    protected $pageType;

    /**
     * Create a new CreatePageTypeStream instance.
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
        $streams->create(
            array(
                'namespace'    => 'pages',
                'slug'         => $this->pageType->getSlug(),
                'description'  => $this->pageType->getDescription(),
                'translatable' => true,
                'locked'       => false
            )
        );
    }
}
