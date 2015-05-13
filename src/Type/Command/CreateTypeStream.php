<?php namespace Anomaly\PagesModule\Type\Command;

use Anomaly\PagesModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class CreateTypeStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Type\Command
 */
class CreateTypeStream implements SelfHandling
{

    /**
     * The page type instance.
     *
     * @var TypeInterface
     */
    protected $pageType;

    /**
     * Create a new CreateTypeStream instance.
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
