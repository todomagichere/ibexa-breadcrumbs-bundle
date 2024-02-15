<?php

namespace TodoMagicHere\IbexaBreadcrumbsBundle;

use eZ\Publish\API\Repository\Repository;
use eZ\Publish\API\Repository\Values\Content\Location;
use Twig\Environment;


class IbexaBreadcrumbs
{
    private $repository;
    private $twig;
    private $locationsRejected;
    private $contenttypesRejected;

    public function __construct(
        Repository $repository,
        Environment $twig,
        array $locationsRejected = null,
        array $contenttypesRejected = null)
    {
        $this->repository = $repository;
        $this->twig = $twig;
        $this->locationsRejected = $locationsRejected;
        $this->contenttypesRejected = $contenttypesRejected;
    }

    public function getBreadcrumbs(Location $location)
    {
        $pathString = $location->pathString;
        $locationIds = explode("/", $pathString);

        $contentService = $this->repository->getContentService();
        $locationService = $this->repository->getLocationService();

        $breadcrumbs = [];
        foreach ($locationIds as $locationId) {
            if ($locationId > 2) {
                $location = $locationService->loadLocation($locationId);
                $content = $contentService->loadContentByContentInfo($location->contentInfo);
                $contentTypeIdentifier = $content->getContentType()->identifier;

                if (in_array($locationId, $this->locationsRejected) || in_array($contentTypeIdentifier, $this->contenttypesRejected)) {
                    continue;
                }

                $breadcrumbs[] = $content;
            }
        }

        return $this->twig->render('@IbexaBreadcrumbs/breadcrumbs.html.twig', [
            'breadcrumbs' => $breadcrumbs,
        ]);

    }

}
