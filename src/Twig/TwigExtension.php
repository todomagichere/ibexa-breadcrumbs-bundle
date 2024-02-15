<?php

namespace TodoMagicHere\IbexaBreadcrumbsBundle\Twig;


use eZ\Publish\API\Repository\Values\Content\Location;
use TodoMagicHere\IbexaBreadcrumbsBundle\IbexaBreadcrumbs;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class TwigExtension extends AbstractExtension
{

    public $breadcrumbs;

    public function __construct(IbexaBreadcrumbs $breadcrumbs)
    {
        $this->breadcrumbs = $breadcrumbs;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('get_breadcrumbs', [$this, 'getBreadcrumbs'], ['is_safe' => ['html']])
        ];
    }

    public function getBreadcrumbs(Location $location)
    {
        return $this->breadcrumbs->getBreadcrumbs($location);
    }

}
