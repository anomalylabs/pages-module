<?php namespace Anomaly\PagesModule\Type\Command;

use Anomaly\PagesModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetTypeStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Type\Command
 */
class GetTypeStream implements SelfHandling
{

    /**
     * The page type instance.
     *
     * @var TypeInterface
     */
    protected $pageType;

    /**
     * Create a new GetTypeStream instance.
     *
     * @param TypeInterface $pageType
     */
    public function __construct(TypeInterface $pageType)
    {
        $this->pageType = $pageType;
    }

    /**
     * Handle the command.
     *
     * @param StreamRepositoryInterface $streams
     * @return \Anomaly\Streams\Platform\Stream\Contract\StreamInterface|null
     */
    public function handle(StreamRepositoryInterface $streams)
    {
        return $streams->findBySlugAndNamespace($this->pageType->getSlug(), 'pages');
    }
}
