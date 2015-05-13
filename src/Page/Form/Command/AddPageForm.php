<?php namespace Anomaly\PagesModule\Page\Form\Command;

use Anomaly\PagesModule\Page\Form\PageEntryFormBuilder;
use Anomaly\PagesModule\Page\Form\PageFormBuilder;
use Anomaly\PagesModule\Type\Contract\TypeRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Http\Request;

/**
 * Class AddPageForm
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Form\Command
 */
class AddPageForm implements SelfHandling
{

    /**
     * The multiple form builder.
     *
     * @var PageEntryFormBuilder
     */
    protected $builder;

    /**
     * Create a new AddPageForm instance.
     *
     * @param PageEntryFormBuilder $builder
     */
    public function __construct(PageEntryFormBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Handle the command.
     *
     * @param TypeRepositoryInterface $types
     * @param PageFormBuilder         $builder
     * @param Request                 $request
     */
    public function handle(TypeRepositoryInterface $types, PageFormBuilder $builder, Request $request)
    {
        $this->builder->addForm('page', $builder->setType($types->find($request->get('type'))));
    }
}
