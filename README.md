# Pages Module

*anomaly.module.pages*

#### Create pages, generate navigation, manage content, and build websites faster than ever.

The Pages Module is PyroCMS's flagship content management system for building dynamic websites with powerful page types and layouts.

## Features

- Page type system
- Layout management
- Nested page structure
- Route handling
- SEO optimization
- Multiple page types
- Template variables
- Page drafts & versioning

## Usage

### Creating Page Types

Navigate to **Pages > Types** in the control panel to create page types with custom fields and layouts.

### Accessing Pages

```php
use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;

$pages = app(PageRepositoryInterface::class);

// Get page by path
$page = $pages->findByPath('/about');

// Get home page
$home = $pages->findHome();

// Get child pages
$children = $pages->findChildren($page);
```

### In Twig

```twig
{# Current page #}
{{ page.title }}
{{ page.meta_title }}
{{ page.content|raw }}

{# Navigation #}
{% for child in page.children %}
    <a href="{{ child.path }}">{{ child.title }}</a>
{% endfor %}

{# Build menu from pages #}
{% for item in pages().root().get() %}
    <a href="{{ item.path }}">{{ item.title }}</a>
{% endfor %}
```

### Page Variables

```twig
{# Access page type fields #}
{{ page.content }}
{{ page.hero_image.path }}
{{ page.gallery.images }}

{# Meta information #}
<title>{{ page.meta_title }}</title>
<meta name="description" content="{{ page.meta_description }}">
```

## Requirements

- Streams Platform ^1.10
- PyroCMS 3.10+
- Preferences Module ^2.3+

## License

The Pages Module is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
