<?php namespace Anomaly\PagesModule\Installer;

/**
 * Class PagesFieldInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Installer
 */
class PagesFieldInstaller
{

    /**
     * Available fields.
     *
     * @var array
     */
    protected $fields = [
        'title' => 'text',
        'slug'  => 'slug',
    ];
}
