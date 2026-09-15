<?php namespace Anomaly\PagesModule;

use Anomaly\Streams\Platform\Addon\Plugin\PluginCriteria;

/**
 * Class PagesModuleCriteria
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class PagesModuleCriteria extends PluginCriteria
{

    /**
     * Get the cache key.
     *
     * @return null|string
     */
    public function getCacheKey()
    {
        return parent::getCacheKey() . '.' . $this->audience();
    }

    /**
     * Return a token for the viewing audience.
     *
     * @return string
     */
    protected function audience()
    {
        if (!$user = auth()->user()) {
            return 'guest';
        }

        // These are the only inputs RemoveRestrictedPages
        // uses, so two viewers sharing them see the same pages.
        $roles = $user->getRoles()->map(
            function ($role) {
                return $role->getId();
            }
        )->sort()->implode('.');

        return md5(($user->isAdmin() ? 'admin' : 'user') . '|' . $roles);
    }

    /**
     * Set options for Bootstrap 4
     *
     * @return $this
     */
    public function bootstrap4()
    {
        $this->options['link_attributes_dropdown'] = ['data-toggle' => 'dropdown'];
        $this->options['child_list_class']         = 'dropdown-menu';
        $this->options['child_link_class']         = 'dropdown-item';
        $this->options['item_class']               = 'nav-item';
        $this->options['link_class']               = 'nav-link';
        $this->options['list_class']               = 'nav';
        $this->options['child_item_class']         = '';

        return $this;
    }

    /**
     * Set options for Bootstrap 3
     *
     * @return $this
     */
    public function bootstrap3()
    {
        $this->options['link_attributes_dropdown'] = ['data-toggle' => 'dropdown'];
        $this->options['child_list_class']         = 'dropdown-menu';
        $this->options['list_class']               = 'nav';

        return $this;
    }

}
