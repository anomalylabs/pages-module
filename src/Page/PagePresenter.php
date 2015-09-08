<?php namespace Anomaly\PagesModule\Page;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\Streams\Platform\Entry\EntryPresenter;
use Anomaly\TextareaFieldType\TextareaFieldTypePresenter;

/**
 * Class PagePresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page
 */
class PagePresenter extends EntryPresenter
{

    /**
     * The decorated object.
     * This is for IDE hinting.
     *
     * @var PageInterface
     */
    protected $object;

    /**
     * Return the route.
     *
     * @return string
     */
    public function route()
    {
        return $this->object->staticPrefix() . $this->object->getRouteSuffix('/');
    }

    /**
     * Return the action array.
     *
     * @return array
     */
    public function action()
    {
        return array_merge(
            [
                'uses'                       => 'Anomaly\PagesModule\Http\Controller\PagesController@view',
                'streams::addon'             => 'anomaly.module.pages',
                'anomaly.module.pages::page' => $this->object->getId()
            ],
            $this->parameters()
        );
    }

    /**
     * Return the route constraints.
     *
     * @return array
     */
    public function constraints()
    {
        /* @var TextareaFieldTypePresenter $constraints */
        $constraints = $this->object->getFieldTypePresenter('route_constraints');

        return (array)$constraints->yaml();
    }

    /**
     * Return the parameters.
     *
     * @return array
     */
    public function parameters()
    {
        $type = $this->object->getType();

        /* @var TextareaFieldTypePresenter $pageParameters */
        /* @var TextareaFieldTypePresenter $typeParameters */
        $pageParameters = $this->object->getFieldTypePresenter('additional_parameters');
        $typeParameters = $type->getFieldTypePresenter('additional_parameters');

        return array_merge((array)$typeParameters->yaml(), (array)$pageParameters->yaml());
    }
}
