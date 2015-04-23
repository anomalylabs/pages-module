<?php namespace Anomaly\PagesModule\Type\Contract;

/**
 * Interface PageTypeRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Type\Contract
 */
interface PageTypeRepositoryInterface
{

    /**
     * Find a page type by ID.
     *
     * @param $id
     * @return null|PageTypeInterface
     */
    public function find($id);
}
