<?php namespace Anomaly\PagesModule\Page;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\Streams\Platform\Support\Authorizer;

/**
 * Class PageAuthorizer
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PagesModule\Page
 */
class PageAuthorizer
{

    /**
     * The authorizer utility.
     *
     * @var Authorizer
     */
    protected $authorizer;

    /**
     * Create a new PageAuthorizer instance.
     *
     * @param Authorizer $authorizer
     */
    public function __construct(Authorizer $authorizer)
    {
        $this->authorizer = $authorizer;
    }

    /**
     * Authorize the page.
     *
     * @param PageInterface $page
     */
    public function authorize(PageInterface $page)
    {
        if (!$page->isEnabled()) {
            $this->authorizer->authorize('anomaly.module.pages::view_drafts');
        }
    }
}
