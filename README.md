
## ibexa-breadcrumbs-bundle
----
This is the first version of ibexa-breadcrumbs-bundle. The intention of this bundle is to make easy the breadcrumb system implementation for the ibexa platform, previously known as ezplatform.

## Installation instructions
----
From composer, run the following command:

    composer require lzr/ibexa-breadcrumbs-bundle

To get the breadcrumb system up and running, it must be invoked from a twig template (usually a full view) with this function:

```twig
{{ get_breadcrumbs(location)|raw }}
```
    

It should be noted that the location parameter is mandatory, since the way in which the breadcrumbs are generated is through their pathString