<?php namespace Anomaly\PagesModule\Page\Form;

use Anomaly\PagesModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class PageFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page\Form
 */
class PageFormBuilder extends FormBuilder
{

    /**
     * The page type.
     *
     * @var null|TypeInterface
     */
    protected $type = null;

    /**
     * Skip these fields.
     *
     * @var array
     */
    protected $skips = [
        'path',
        'type',
        'entry',
        'parent',
        'str_id'
    ];

    /**
     * Fired when the builder is ready to build.
     *
     * @throws \Exception
     */
    public function onReady()
    {
        if (!$this->getType() && !$this->getEntry()) {
            throw new \Exception('The $type parameter is required when creating a page.');
        }
    }

    /**
     * Fired just before saving the form.
     */
    public function onSaving()
    {
        $entry = $this->getFormEntry();
        $type  = $this->getType();

        if (!$entry->type_id) {
            $entry->type_id = $type->getId();
        }

        if (!$entry->str_id) {
            $entry->str_id = str_random();
        }
    }

    /**
     * Get the type.
     *
     * @return TypeInterface|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the type.
     *
     * @param TypeInterface $type
     * @return $this
     */
    public function setType(TypeInterface $type)
    {
        $this->type = $type;

        return $this;
    }
}
