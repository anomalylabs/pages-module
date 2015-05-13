<?php namespace Anomaly\PagesModule\Page\Form\Command;

use Anomaly\PagesModule\Entry\Form\EntryFormBuilder;
use Anomaly\PagesModule\Page\Form\PageEntryFormBuilder;
use Anomaly\PagesModule\Type\Contract\TypeRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Http\Request;

/**
 * Class AddEntryForm
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Form\Command
 */
class AddEntryForm implements SelfHandling
{

    use DispatchesCommands;

    /**
     * The multiple form builder.
     *
     * @var PageEntryFormBuilder
     */
    protected $builder;

    /**
     * Create a new AddEntryForm instance.
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
     * @param EntryFormBuilder        $builder
     * @param Request                 $request
     */
    public function handle(TypeRepositoryInterface $types, EntryFormBuilder $builder, Request $request)
    {
        $type = $types->find($request->get('type'));

        $this->builder->addForm('entry', $builder->setModel($type->getEntryModelName()));
    }
}
