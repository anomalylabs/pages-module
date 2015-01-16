<?php namespace Anomaly\PagesModule\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

/**
 * Class PagesStreamInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Installer
 */
class PagesStreamInstaller extends StreamInstaller
{

    /**
     * The stream configuration.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'pages',
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [

    ];

}
