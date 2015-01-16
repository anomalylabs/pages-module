<?php namespace Anomaly\PagesModule;

use Anomaly\Streams\Platform\Addon\Module\ModuleInstaller;

/**
 * Class PagesModuleInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule
 */
class PagesModuleInstaller extends ModuleInstaller
{

    /**
     * Module installers.
     *
     * @var array
     */
    protected $installers = [
        'Anomaly\PagesModule\Installer\PagesFieldInstaller',
        'Anomaly\PagesModule\Installer\PagesStreamInstaller'
    ];

}
