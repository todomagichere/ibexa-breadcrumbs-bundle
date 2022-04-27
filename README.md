
# Ibexa breadcrumbs bundle

This is the first version of ibexa breadcrumbs bundle. The intention of this bundle is to make easy the breadcrumb system implementation for the ibexa platform, previously known as ezplatform.



## Installation instructions

From composer, run the following command:

    composer require lzr/ibexa-breadcrumbs-bundle

To get the breadcrumb system up and running, it must be invoked from a twig template (usually a full view) with this function:

```twig
{{ get_breadcrumbs(location) }}
```

    

It should be noted that the location parameter is mandatory, since the way the breadcrumbs are generated is through their pathString



## Configuration file
The point of this configuration file is to avoid a certain number of locations, passing the location id, or in the other hand manage the content types rejected, for example:
```yaml
#config/packages/ibexa_breadcrumbs.yaml
ibexa_breadcrumbs:
    locations_rejected: [2, 3, 140]
    contenttypes_rejected: ['folder', 'distributor', 'article']
```



## Twig template
Suppose we have the following content tree:

![imagen](https://user-images.githubusercontent.com/23119890/142244237-508fed27-f970-4a9d-99e6-5d5c7561b29c.png)


We can see that it is rendered as follows:

![imagen](https://user-images.githubusercontent.com/23119890/142036902-9b3434c5-ebd1-4cc3-a289-e8fdfa57994a.png)


## Overriding Twig template
To override the default template breadcrumbs.html.twig just create a new template named ezplatform/templates/bundles/IbexaBreadcrumbsBundle/breadcrumbs.html.twig (See default template behaviour)
