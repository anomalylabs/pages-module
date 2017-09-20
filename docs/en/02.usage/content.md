## Usage[](#usage)

This section will show you how to use the addon to build and deliver rich structured content.


### Types[](#usage/types)

Page `types` are allow you to define custom fields and layout for pages _of this type_.


#### Fields[](#usage/types/fields)

Below is a list of `fields` in the `types` stream. Fields are accessed as attributes:

    $type->name;

Same goes for decorated instances in Twig:

    {{ type.name }}

###### Fields

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Type</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

name

</td>

<td>

text

</td>

<td>

The type name.

</td>

</tr>

<tr>

<td>

description

</td>

<td>

textarea

</td>

<td>

The type description.

</td>

</tr>

<tr>

<td>

slug

</td>

<td>

slug

</td>

<td>

The slug used for API and database table.

</td>

</tr>

<tr>

<td>

handler

</td>

<td>

addon

</td>

<td>

The page handler extension to use.

</td>

</tr>

<tr>

<td>

theme_layout

</td>

<td>

select

</td>

<td>

The default theme layout for pages of this type.

</td>

</tr>

<tr>

<td>

layout

</td>

<td>

editor

</td>

<td>

The layout of the custom page fields.

</td>

</tr>

</tbody>

</table>


#### Theme Layouts[](#usage/types/theme-layouts)

The type's theme layout will define the defualt theme layout to wrap the page's content.

Theme layouts generally specify the top level structural layout of your website. Perhaps a layout for your home page specifically, one for two column pages, and perhaps one custom HTML pages.


##### Accessing Active Pages[](#usage/types/theme-layouts/accessing-active-pages)

You can access the active page in theme layouts if needed by using the `template` super variable.

    {{ template.page.title }}

A more realistic example might look like this:

    {% if template.page.banner_image.id %}
        <div id="banner" style="background-image: url({{ template.page.banner_image.path }});">
            ...
        </div>
    {% endif %}


#### Page Layouts[](#usage/types/page-layouts)

The type's page layout is wrapped by the theme layout.

The primary goal of the page layout is to display the page's custom field values.


##### Defining Page Layouts[](#usage/types/page-layouts/defining-page-layouts)

When defining the page layout the `page` is available to access field values.

In the simple example below `content` is the field slug of the WYSIWYG field assigned to this page's type.

    <h1>{{ page.title }}</1h>

    {{ page.content.render|raw }}

A more powerful example using our [Grid field type](/documentation/grid-field-type) with the field slug `content` might look like this:

    {% for section in page.content %}
        <div class="section {{ section.type }}-section-type">
            {% include "theme::sections/" ~ section.type %}
        </div>
    {% endfor %}

The above example will let you define well designed and controlled content section that allow the user to easily build structured stacks of content.


### Pages[](#usage/pages)

Pages are the primary components of your structured content. Every page has a type that defines it's available fields and layout.


#### Fields[](#usage/pages/fields)

Below is a list of `fields` in the `pages` stream not including custom fields.

Fields are accessed as attributes:

    $page->title;

Same goes for decorated instances in Twig:

    {{ page.title }}

Note that _active_ pages get pushed into the template super variable:

    {{ template.page.title }}

###### Fields

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Type</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

title

</td>

<td>

text

</td>

<td>

The display title.

</td>

</tr>

<tr>

<td>

slug

</td>

<td>

slug

</td>

<td>

The path slug.

</td>

</tr>

<tr>

<td>

meta_title

</td>

<td>

text

</td>

<td>

The meta title falls back to the page title.

</td>

</tr>

<tr>

<td>

meta_description

</td>

<td>

textarea

</td>

<td>

The meta description.

</td>

</tr>

<tr>

<td>

meta_keywords

</td>

<td>

tags

</td>

<td>

The meta keywords.

</td>

</tr>

<tr>

<td>

enabled

</td>

<td>

boolean

</td>

<td>

Whether the page is enabled or not.

</td>

</tr>

<tr>

<td>

home

</td>

<td>

boolean

</td>

<td>

Whether the page is the home page or not.

</td>

</tr>

<tr>

<td>

visible

</td>

<td>

boolean

</td>

<td>

Whether to display the page in `structure()` navigation or not.

</td>

</tr>

<tr>

<td>

exact

</td>

<td>

boolean

</td>

<td>

Whether to require an exact URI match or not.

</td>

</tr>

<tr>

<td>

allowed_roles

</td>

<td>

multiple

</td>

<td>

The user roles allowed to view the page.

</td>

</tr>

<tr>

<td>

theme_layout

</td>

<td>

select

</td>

<td>

The theme layout to override the value defined in the page's type.

</td>

</tr>

</tbody>

</table>


### Plugin[](#usage/plugin)

This section will go over how to use the plugin that comes with the Pages module.


#### structure[](#usage/plugin/structure)

The `structure` function let's you generate navigation structure based on your pages structure.

The returned plugin criteria will render the resulting navigation automatically using `__toString()` if you do not explicitly call `render()`.

###### Returns: `\Anomaly\Streams\Platform\Addon\Plugin\PluginCriteria`

###### Arguments

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

$root

</td>

<td>

false

</td>

<td>

mixed

</td>

<td>

none

</td>

<td>

The id, instance, or path of the root navigation page.

</td>

</tr>

</tbody>

</table>

###### Twig

    {{ structure()|raw }}

    {# Showing child page navigation #}
    {{ structure(template.page)
        .linkAttributesDropdown({'data-toggle': 'dropdown'})
        .listClass('nav navbar-nav navbar-right')
        .childListClass('dropdown-menu')
        .render()|raw }}


##### Available Options[](#usage/plugin/structure/available-options)

The `structure` uses the plugin criteria to allow you to configure options for the resulting navigation.

Options are defined by chaining together `camelCase` methods:

    {{ structure().optionOne('example')|raw }} // Results in option_one = example

So to define `dropdown_class` for example you would do this:

    {{ structure().dropdownClass('dropdown')|raw }}

<div class="alert alert-info">**Pro Tip:** Defining criteria options this way is standard throughout Pyro!</div>

###### Options

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

view

</td>

<td>

false

</td>

<td>

anomaly.module.pages::structure

</td>

<td>

The base view to render the navigation from.

</td>

</tr>

<tr>

<td>

macro

</td>

<td>

false

</td>

<td>

anomaly.module.pages::macro

</td>

<td>

The macro to use for rendering the navigation.

</td>

</tr>

<tr>

<td>

depth

</td>

<td>

false

</td>

<td>

none

</td>

<td>

The maximum depth of the navigation.

</td>

</tr>

<tr>

<td>

list_tag

</td>

<td>

false

</td>

<td>

ul

</td>

<td>

The list tag to use.

</td>

</tr>

<tr>

<td>

list_class

</td>

<td>

false

</td>

<td>

none

</td>

<td>

The list class to use.

</td>

</tr>

<tr>

<td>

item_tag

</td>

<td>

false

</td>

<td>

li

</td>

<td>

The list item tag to use.

</td>

</tr>

<tr>

<td>

dropdown_class

</td>

<td>

false

</td>

<td>

dropdown

</td>

<td>

The CSS class for links containing child links.

</td>

</tr>

<tr>

<td>

active_class

</td>

<td>

false

</td>

<td>

active

</td>

<td>

The CSS class for links that are selected or whose child link is selected.

</td>

</tr>

<tr>

<td>

selected_class

</td>

<td>

false

</td>

<td>

current

</td>

<td>

The CSS class for the currently selected navigation link.

</td>

</tr>

<tr>

<td>

link_class

</td>

<td>

false

</td>

<td>

none

</td>

<td>

The CSS class to use for links.

</td>

</tr>

<tr>

<td>

link_attributes

</td>

<td>

false

</td>

<td>

[]

</td>

<td>

An array of key value html attributes for links.

</td>

</tr>

<tr>

<td>

link_attributes_dropdown

</td>

<td>

false

</td>

<td>

[]

</td>

<td>

An array of key value html attributes for links that have a dropdown.

</td>

</tr>

<tr>

<td>

child_list_tag

</td>

<td>

false

</td>

<td>

list_tag

</td>

<td>

The list tag for child lists.

</td>

</tr>

<tr>

<td>

child_list_class

</td>

<td>

false

</td>

<td>

none

</td>

<td>

The list class for child lists.

</td>

</tr>

<tr>

<td>

dropdown_toggle

</td>

<td>

false

</td>

<td>

none

</td>

<td>

The dropdown toggle tag to use in the case a dropdown toggle is desired.

</td>

</tr>

<tr>

<td>

dropdown_toggle_class

</td>

<td>

false

</td>

<td>

none

</td>

<td>

The dropdown toggle class to use in the case a dropdown toggle is desired.

</td>

</tr>

<tr>

<td>

dropdown_toggle_attributes

</td>

<td>

false

</td>

<td>

[]

</td>

<td>

An array of key value html attributes for the dropdown toggle.

</td>

</tr>

<tr>

<td>

dropdown_toggle_text

</td>

<td>

false

</td>

<td>

none

</td>

<td>

The text or HTML to display inside the dropdown toggle.

</td>

</tr>

</tbody>

</table>


#### page[](#usage/plugin/page)

The `page` function returns the decorated instance of the desired page.

###### Returns: `\Anomaly\PagesModule\Page\PagePresenter` or `null`

###### Arguments

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

$identifier

</td>

<td>

false

</td>

<td>

mixed

</td>

<td>

Current page

</td>

<td>

The id or path of the desired page.

</td>

</tr>

</tbody>

</table>

###### Twig

    <a href="{{ page('about/company').route('view') }}"></a>

    {# Displaying page content #}
    {{ page('about/contact').content()|raw }}
