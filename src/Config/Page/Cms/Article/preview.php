<?php

namespace Be\Theme\Market\Config\Page\Cms\Article;

use Be\Be;

class preview
{


    public int $west = 25;
    public int $center = 75;
    public int $east = 0;

    public array $westSections = [
        [
            'name' => 'Theme.Market.AppCmsSideSearchForm',
        ],
        [
            'name' => 'Theme.Market.AppCmsSideCategories',
        ],
        [
            'name' => 'Theme.Market.AppCmsSideTopTags',
        ],
    ];

    public array $centerSections = [
        [
            'name' => 'Theme.Market.AppCmsArticleDetail',
        ],
    ];

    public function __construct()
    {
        $northMenu = Be::getMenu('North');
        $menuActiveId = null;
        foreach ($northMenu->getItems() as $item) {
            if (substr($item->route, 0, 11) === 'Cms.Article') {
                $menuActiveId = $item->id;
                break;
            }
        }

        if ($menuActiveId !== null) {
            $northMenu->setActiveId($menuActiveId);
        }
    }

}
