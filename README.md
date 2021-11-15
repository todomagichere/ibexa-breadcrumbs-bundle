
## ibexa-breadcrumbs-bundle

This is the first version of ibexa-breadcrumbs-bundle. The intention of this bundle is to make easy the breadcrumb system implementation for the ibexa platform, previously known as ezplatform.

## Installation instructions

From composer, run the following command:

    composer require lzr/ibexa-breadcrumbs-bundle

To get the breadcrumb system up and running, it must be invoked from a twig template (usually a full view) with this function:

```twig
{{ get_breadcrumbs(location)|raw }}
```
    

It should be noted that the location parameter is mandatory, since the way in which the breadcrumbs are generated is through their pathString

Nowadays there is a "rejected locations and rejected content types" configuration file, but the bundle IS NOT ready for it. This is the configuration file:

```yaml
#config/packages/ibexa_breadcrumbs.yaml
ibexa_breadcrumbs:
    locations_rejected: []
    contenttypes_rejected: []
```

The point of this is to avoid a certain number of locations, passing the location id, or in the other hand manage the content types rejected, for example:
```yaml
#config/packages/ibexa_breadcrumbs.yaml
ibexa_breadcrumbs:
    locations_rejected: [2,3,140]
    contenttypes_rejected: ['folder', 'distributor', 'article']
```

Any suggestions please contact to rperez@infinitumdigital.net